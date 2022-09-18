<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ReturnProduct;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReturnProductCollection;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class ReturnProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function returnProducts(Request $request)
    {
        $searchQuery = request()->all();
        $limit = Arr::get($searchQuery, 'limit', static::ITEM_PER_PAGE);

        // return all products that return by the user 
        $returnProducts = ReturnProduct::query()
        ->with('client:id,name','product:id,name')
        ->where('user_id', auth()->id())
        ->paginate($limit);


        return new ReturnProductCollection($returnProducts);
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addReturnProducts(Request $request)
    {
        //validation
        $validator = Validator::make(
            $request->all(),
            [
                "order_id" => ['required', 'exists:orders,id'],
                "product_id" => ['required', 'exists:products,id'],
                "type" => ['required', 'in:piece,box'],
                "quantity" => ['required'],
                "reason" => ['required'],
            ],
            [
                'type.in' => 'The type must be piece or box',
            ]
        );

        if ($validator->fails()) {
            return $this->josnResponse(false,  __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        //find order
        $order = Order::find($request->order_id);
        $discount = $order->discount;
        $discountType = $order->discount_type;

        if (!$order->is_accepted) {
            return $this->josnResponse(false,  __('api.order_not_accepted'), Response::HTTP_BAD_REQUEST);
        }

        // get product price from order_details
        $productPrice = $order->orderDetails->where('product_id', $request->product_id)->first()->product_price;

        $sumProductPrice = $productPrice * $request->quantity;

        if ($order->discount) {
            // then calualte the discount based on discount type
            if ($discountType === 'percentage') {
                return $discount;
                $sum = ($sumProductPrice * $discount) / 100;
            } else {
                $sum = $sumProductPrice - $discount;
            }
        }

        // find the product and update the stock
        $product = Product::find($request->product_id);
        if ($request->type === 'box') {
            // add the quantity to the stock
            $product->box_quantity = $product->box_quantity * $request->quantity;
            $product->quantity = $product->quantity + ($product->pcs_per_box * $request->quantity);
            $product->save();
        }
        $product->quantity = $product->quantity + $request->quantity;
        $product->save();

        // create return product
        $returnProduct = ReturnProduct::create([
            "user_id" => auth()->id(),
            "order_id" => $request->order_id,
            "product_id" => $request->product_id,
            "client_id" => $order->client_id,
            "type" => $request->type === 'box' ? 0 : 1,
            "quantity" => $request->quantity,
            "reason" => $request->reason,
            "estimate_price" => $sumProductPrice,
        ]);

        return $this->josnResponse(true, __('api.all_resource', ['resource' => __('attributes.returnProduct')]), Response::HTTP_CREATED, $returnProduct);
    }

    public function returnMoney(Request $request)
    {

        //find return product
        $returnProduct = ReturnProduct::find($request->return_product_id);

        if (!$returnProduct) {
            return $this->josnResponse(false,  __('api.return_product_not_found'), Response::HTTP_NOT_FOUND);
        }

        // check if return_price <=  estimate_price
        if ($request->return_price > $returnProduct->estimate_price) {
            return $this->josnResponse(false,  __('api.return_price_greater'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $returnProduct->return_price = $request->return_price;
        $returnProduct->return_date = now();
        $returnProduct->save();

        return $this->josnResponse(true, __('api.money_returned'), Response::HTTP_OK);
    }
}
