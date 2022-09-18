<?php

namespace App\Http\Resources;

use App\Models\Coupon;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class OrderDetailCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'result' => true,
            'message' => __('api.show_resource_info', ['resource' => __('attributes.order')]),
            'status' => Response::HTTP_OK,
            'data' => $this->collection->map(function ($data) {

                $orderDetails = [];
                foreach ($data->orderDetails as $orderDetail) {
                    $orderDetailArr['product_id'] = $orderDetail->product_id;
                    $orderDetailArr['product_name'] = $orderDetail->product->name;
                    $orderDetailArr['product_image'] = getFile($orderDetail->product);
                    $orderDetailArr['product_price'] = formatPrice($orderDetail->product_price);
                    $orderDetailArr['quantity'] = $orderDetail->quantity;
                    $orderDetailArr['price'] = formatPrice($orderDetail->total_price);
                    $orderDetails[] = $orderDetailArr;
                }

                $discount = null;
                $coupon = null;
                if ($data->coupon_code) {
                    $coupon = Coupon::query()->where('code', $data->coupon_code)->first();
                    $discount = $coupon->discount;
                    if ($coupon->discount_type == "amount") {
                        $discount = formatPrice($discount);
                    }
                    $discount = '%' . $discount;
                }
                return [
                    'order_id' => $data->id,
                    'client_id' => $data->client->id,
                    'client_name' => $data->client->name,
                    'arrive_at' => $data->arrive_at,
                    'coupon_code' => $data->coupon_code ?? 'No Coupon',
                    'sub_total' => formatPrice($data->total_price + $data->discount_amount),
                    'discount_type' => $coupon ? $coupon->discount_type : $coupon,
                    'discount' => $discount,
                    'discount_amount' => formatPrice($data->discount_amount),
                    'total_price' => formatPrice($data->total_price),
                    "due_payment" => $data->payment ? formatPrice($data->payment->due) : formatPrice($data->total_price),
                    "paid" => formatPrice($data->payment->paid),
                    "is_paid" => $data->is_paid,
                    "payment_id" => $data->payment ? $data->payment->id : null,
                    "order_status" => $data->status,
                    "order_detail" => $orderDetails,
                ];
            }),

        ];
    }
}
