<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class ReturnProductCollection extends ResourceCollection
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
            'message' =>  __('api.all_resource', ['resource' => __('attributes.return_product')]),
            'status' => Response::HTTP_OK,
            "total" => $this->collection->count(),
            'data' => $this->collection->map(function ($data) {
                return [
                    'id' => $data->id,
                    'product_id' => $data->product_id,
                    'product_name' => $data->product->name,
                    'client_id' => $data->client->id,
                    'client_name' => $data->client->name,
                    'return_type' => $data->type == 1 ? 'piece' : 'box',
                    'quantity' => $data->quantity,
                    'estimate_price' => formatPrice($data->estimate_price),
                    'return_price' => formatPrice($data->return_price),
                    'return_date' => $data->return_date,
                    'reason' => $data->reason,
                ];
            }),

        ];
    }
}
