<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use DB;

use function PHPSTORM_META\type;

class CartController extends Controller
{

    public function add(Request $request)
    {
        //check permission
        $this->authorize("cart_add");

        //validation
        $validator = Validator::make($request->all(), [
            "product_id" => ['required', 'exists:products,id'],
            "type" => ['required', 'in:0,1'],
            "client_id" => ['sometimes', 'exists:clients,id'],
            "quantity" => ['required','numeric','min:1'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false, __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        // find the product
        $product = Product::find($request->product_id);

        // check product stock
        $freeSample = $request->free;
        $type = $request->type; // 0 = piece, 1 = box
        $quantity = $request->quantity;

        //free sample can't be more than requested quantity
        if ($freeSample > $quantity) {
            return $this->josnResponse(true, __('api.free_sample_more_than_quantity'), Response::HTTP_BAD_REQUEST);
        }

        //check if product has box or not
        if ($type == 1 && !$product->is_box) {
            return $this->josnResponse(true, __('api.product_not_sell_by_box'), Response::HTTP_BAD_REQUEST);
        }

        // check stock qunatity for both piece and box
        if ($type == 0) {
            // check piece stock qunatity
            if (($quantity + $freeSample) > $product->quantity) {
                return $this->josnResponse(true, __('api.product_out_of_stock'), Response::HTTP_BAD_REQUEST);
            }
        } else {
            // check box stock qunatity
            if (($quantity + $freeSample) > $product->box_quantity) {
                return $this->josnResponse(true, __('api.product_out_of_stock'), Response::HTTP_BAD_REQUEST);
            }
        }

        Cart::updateOrCreate(
            [
                "added_by" => auth()->id(),
                "client_id" => $request->client_id ?? null,
                "product_id" => $request->product_id,
            ],
            [
                "quantity" => $request->quantity,
                "price" => $type ? $product->box_price : $product->price,
                "purchase_price" => $type ? $product->purchase_box_price : $product->purchase_price,
                "free" => $freeSample,
                "type" => $type,
            ]
        );

        return $this->josnResponse(true, __('api.add_to_cart'), Response::HTTP_CREATED);
    }

    public function clientSelect(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            "client_id" => ['required', 'exists:clients,id'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false, __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        Cart::whereAddedBy(auth()->id())->update(['client_id' => $request->client_id]);

        return $this->josnResponse(true, __('api.client_selected'), Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //check permission
        $this->authorize("cart_delete");

        $cart->delete();
        return $this->josnResponse(true, __('api.cart_removed'), Response::HTTP_OK);
    }

    public function summary($user_id)
    {
        $items = Cart::orderByDesc('created_at')->where('added_by', $user_id)->get();

        if ($items->isEmpty()) {
            return $this->josnResponse(true, __('api.cart_empty'), Response::HTTP_OK, []);
        }

        // query to get the client 
        $client = $items[0]->client_id ? Client::where('id', $items[0]->client_id)->first() : null;



        // query to to get the coupon
        $coupon = $items[0]->coupon_code ? Coupon::where('code', $items[0]->coupon_code)->first() : null;

        $sumSubTotal = 0.000;
        $sum = 0.000;
        foreach ($items as $cartItem) {
            $sumSubTotal += $cartItem->price *  $cartItem->quantity;
            $itemSum = 0;
            // cart price manius the deiscount
            $itemSum += ($cartItem->price *  $cartItem->quantity) - $cartItem->discount;
            $sum += $itemSum;
        }


        // modify cart items
        $cartItems = $items->map(function ($data) {
            return [
                'cart_id' => $data->id,
                'product_id' => $data->product_id,
                'product_name' => $data->product->name,
                'product_image' => getFile($data->product),
                'category' => $data->product->category->name,
                'price' => $data->price,
                'type' => $data->type ? "Box" : "Piece",
                'free' => $data->free,
                'quantity' => $data->quantity,
            ];
        });

        $data = [
            "total" =>  count($items),
            "client_id" => $client ? $client->id : null,
            "client_name" =>  $client ? $client->name : null,
            "coupon_code" => $items[0]->coupon_code,
            "discount" =>  0 . "%",
            "discount_amount" => formatPrice($items->sum('discount')),
            'sub_total' => formatPrice($sumSubTotal),
            'total_price' => formatPrice($sum),
            "coupon_applied" => $items[0]->coupon_applied == 1,

        ];

        if ($coupon) {
            $data["discount_type"] = $coupon->discount_type;
            $data["discount"] = $coupon->discount_type == "amount" ? formatPrice($coupon->discount) : $coupon->discount . "%";
        }

        $data["items"] = $cartItems;

        return $this->josnResponse(true, __('api.cart_summary'), Response::HTTP_OK, $data);
    }
}
