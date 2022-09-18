<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class OrderCollection extends ResourceCollection
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
            'message' => __('api.all_resource', ['resource' => __('attributes.order')]),
            'status' => Response::HTTP_OK,
            'total' => $this->collection->count(),
            'data' => $this->collection->map(function ($data) {
                return [
                    'order_id' => $data->id,
                    'client_id' => $data->client->id,
                    'client_name' => $data->client->name    ,
                    'is_discounted' => $data->coupon_code ? true : false,
                    'sub_total' => formatPrice($data->total_price + $data->discount_amount),
                    'discount_amount' => formatPrice($data->discount_amount),
                    'total_price' => formatPrice($data->total_price),
                    'order_date' => $data->created_at,
                    'order_status' => $data->status,
                    'delivery_date' => $data->arrive_at,
                    'payment' => $data->is_paid,
                    'order_status' => $data->status,
                    'note' => $data->note,
                ];
            }),

        ];
    }
}
