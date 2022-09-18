<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderDetailCollection;
use App\Traits\UserOrderTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ExchangeHistory;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use DB;

class OrderController extends Controller
{
    use UserOrderTrait;
    /**
     * Display a listing of the resource.
     * return orders that made by sr
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //check permission
        $this->authorize("order_view");

        //userOrder() come from UserOrderTrait
        $orders = $this->userOrder()->get();
        return new OrderCollection($orders);
    }

    // RETURN ALL ORDERS
    public function orderList(Request $request)
    {
        //check permission
        $this->authorize("order_view");

        $searchQuery = request()->all();
        $limit = Arr::get($searchQuery, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchQuery, 'keyword', '');
        $startDate = Arr::get($searchQuery, 'start_date', '');
        $endDate = Arr::get($searchQuery, 'end_date', '');
        $startDate = Arr::get($searchQuery, 'start_date', '');
        $endDate = Arr::get($searchQuery, 'end_date', '');
        $startArrive = Arr::get($searchQuery, 'start_arrive', '');
        $endArrive = Arr::get($searchQuery, 'end_arrive', '');
        $payment = Arr::get($searchQuery, 'payment', '');
        $categoryId = Arr::get($searchQuery, 'category_id', '');
        $status = Arr::get($searchQuery, 'status', '');
        $client_id = Arr::get($searchQuery, 'client_id', '');


        $orders = Order::query()
            ->with('client:id,name,phone,phone_alt,category_id')
            ->orderByDesc('id')
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('id', 'like', '%' . $keyword . '%');
            })
            ->when($startDate, function ($query) use ($startDate, $endDate) {
                $endDate = $endDate ?  Carbon::parse($endDate)->addDays(1) : now();
                return $query->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->when($endDate, function ($query) use ($startDate, $endDate) {
                return $query->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->addDays(1)]);
            })
            ->when($endArrive, function ($query) use ($startArrive, $endArrive) {
                return $query->whereBetween('arrive_at', [$startArrive, Carbon::parse($endArrive)->addDays(1)]);
            })
            ->when($payment == 0 || $payment != null, function ($query) use ($payment) {
                return $query->whereIsPaid($payment);
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                return $query->whereHas('client', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                });
            })
            ->when($status, function ($query) use ($status) {
                return $query->whereStatus($status);
            })
            ->when($client_id, function ($query) use ($client_id) {
                return $query->where("client_id", $client_id);
            })
            ->paginate($limit);

        return new OrderCollection($orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //check permission
        $this->authorize("order_view");

        $order = Order::query()
            ->select([
                "id",
                "client_id",
                "has_bonus",
                "total_price",
                "is_paid",
                "coupon_code",
                "note",
                "discount_amount",
                "arrive_at",
                "status",
                "status_by",
            ])
            ->with([
                'client:id,name',
                'orderDetails:id,order_id,product_id,quantity,product_price,total_price' => [
                    'product:id,name,category_id' => [
                        'category:id,name',
                    ],
                ],
            ])
            ->whereId($order->id)
            ->get();

        return new OrderDetailCollection($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check permission
        $this->authorize("order_add");

        //validation
        $validator = Validator::make($request->all(), [
            "client_id" => ['required', 'exists:clients,id'],
            "lat" => ['required'],
            "long" => ['required'],
            "note" => ['string'],
            "arrive_at" => ['required', 'date'],
            "amount_paid" => ["sometimes", "numeric"],
            "exchange_type" => ["sometimes", "in:USD,IQD"],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false, __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        // get sr user
        $user = $request->user();

        // find all carts that added by this user
        $cartItems = Cart::where([
            'added_by' => $user->id,
            'client_id' => $request->client_id,
        ])->get();

        if ($cartItems->isEmpty()) {
            return $this->josnResponse(true, __('api.cart_empty'), Response::HTTP_OK, []);
        }

        $sum = 0.000;
        $purchasePriceSum = 0.000;
        $hasBonus = false;

        foreach ($cartItems as $cartItem) {
            //check if cart has free product
            if ($cartItem->free) {
                $hasBonus = true;
            }

            $itemSum = 0;
            $itemSum += ($cartItem->price * $cartItem->quantity) - $cartItem->discount;
            $sum += $itemSum;

            $itemPurchaseSum = 0;
            $itemPurchaseSum += ($cartItem->purchase_price * $cartItem->quantity) - $cartItem->discount;
            $purchasePriceSum += $itemPurchaseSum;
        }

        if ($cartItems[0]->coupon_code) {
            $coupon = Coupon::whereCode($cartItems[0]->coupon_code)->first();
        }

        // calculate profit
        $profit = $sum - $purchasePriceSum;

        $order = Order::create([
            "client_id"         => $request->client_id,
            "lat"               => $request->lat,
            "long"              => $request->long,
            "arrive_at"         => $request->arrive_at,
            "order_by"          => $user->id,
            "coupon_code"       => $cartItems[0]->coupon_code,
            "note"              => $request->note,
            "discount_type"     => $coupon->discount_type ?? null,
            "discount"          => $coupon->discount ?? null,
            "discount_amount"   => $cartItems->sum('discount'),
            "total_price"       => $sum,
            "has_bonus"         => $hasBonus,
            "profit"            => $profit,
        ]);

        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);

            OrderDetail::create([
                "order_id" => $order->id,
                "product_id" => $product->id,
                //price either to box or piece (calculate from cart api add fn)
                "product_price" => $cartItem->price,
                "coupon_code" => $cartItems[0]->coupon_code,
                "total_price" => $cartItem->price * $cartItem->quantity,
                "quantity" => $cartItem->quantity,
                "type" => $cartItem->type,
                "free" => $cartItem->free
            ]);


            //update product number of sale
            $product->increment('num_of_sales');

            //reduce product stock 
            if ($cartItem->type) {
                $product->decrement("box_quantity", $cartItem->quantity + $cartItem->free);
                // reduce product box quantity
                $product->decrement("quantity", (($cartItem->quantity + $cartItem->free) * $product->pcs_per_box));
            } else {
                $product->decrement("quantity", $cartItem->quantity + $cartItem->free);
                // get new box qunatity
                $newBoxQuantity = $product->quantity / $product->pcs_per_box;

                // update box quantity
                $product->update([
                    "box_quantity" => $newBoxQuantity
                ]);
            }
        }

        // empty cart
        $cartItems = Cart::where([
            'added_by' => $user->id,
            'client_id' => $request->client_id,
        ])->delete();

        try {
            $payment = Payment::create([
                "order_id" => $order->id,
                "client_id" => $order->client_id,
                "paid" => 0,
                "due" => $order->total_price,
            ]);
            if ($request->has("amount_paid")) {
                if ($request->amount_paid > $order->total_price) {
                    return $this->josnResponse(false, __('api.cant_pay_more'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
                } else {
                    $this->payCheck($payment, $request);
                }
            }
        } catch (\Throwable $th) {
            //throw TODO
            Log::alert($th);
        }

        return $this->josnResponse(true, __('api.create_resource', ['resource' => __('attributes.order')]), Response::HTTP_CREATED);
    }

    public function pay(Request $request, Order $order)
    {
        //check permission
        // $this->authorize("get_paid");

        //validation
        $validator = Validator::make($request->all(), [
            "amount_paid" => ["required", "numeric"],
            "exchange_type" => ["required", "in:USD,IQD"],
        ]);

        $payment = $order->payment;

        // if ($payment->is_paid || $payment->paid+$request->amount_paid > $payment->due) {
        if ($payment->is_paid) {
            return $this->josnResponse(false, __('api.cant_pay_more'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }
        $this->payCheck($payment, $request);

        return $this->josnResponse(true, __('api.create_resource', ['resource' => __('attributes.pay')]), Response::HTTP_CREATED);
    }

    private function payCheck($payment, $request)
    {
        $exchange = ExchangeHistory::latest()->first();

        $payment->history()->create([
            "amount_paid" => $request->amount_paid,
            "date" => now(),
            "client_id" => $payment->client_id,
            "user_id" => auth()->id(),
            "exchange_type" => $request->exchange_type,
            "usd_rate" => $exchange->iqd,
        ]);

        $payment->increment('paid', $request->amount_paid);
        $payment->decrement('due', $request->amount_paid);
        $payment->is_paid = $payment->due == 0;

        $payment->save();
    }

    // make order delivered
    public function pickedup(Request $request, Order $order)
    {
        //check permission
        $this->authorize("order_delivered");

        // check if order is assigned to user
        if (!$order->is_assigned) {
            return $this->josnResponse(false, __('api.order_not_assigned'), Response::HTTP_BAD_REQUEST);
        }

        //check if order is already delivered
        if ($order->status == "delivered") {
            return $this->josnResponse(false, __('api.order_already_delivered'), Response::HTTP_BAD_REQUEST);
        }

        $order->is_pickedup = true;
        $order->pickedup_by = auth()->id();
        $order->pickedup_at = now();
        $order->status = "pickedup";
        $order->save();

        return $this->josnResponse(true, __('api.order_pickedup'), Response::HTTP_OK);
    }

    // make order delivered
    public function delivered(Request $request, Order $order)
    {
        //check permission
        $this->authorize("order_delivered");

        // check if order is picked up
        if (!$order->is_pickedup) {
            return $this->josnResponse(false, __('api.order_not_pickup'), Response::HTTP_BAD_REQUEST);
        }

        //check if order is already delivered
        if ($order->status == "delivered") {
            return $this->josnResponse(false, __('api.order_already_delivered'), Response::HTTP_BAD_REQUEST);
        }

        $order->is_delivered = true;
        $order->delivered_at = now();
        $order->status = "delivered";
        $order->save();

        return $this->josnResponse(true, __('api.order_delivered'), Response::HTTP_OK);
    }
}
