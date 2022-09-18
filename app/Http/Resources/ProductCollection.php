<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class ProductCollection extends ResourceCollection
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
            'message' => __('api.all_resource', ['resource' => __('attributes.product')]),
            'status' => Response::HTTP_OK,
            'total' => $this->collection->count(),
            'data' => $this->collection->map(function ($data) {
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'barcode' => $data->barcode,
                    'description' => $data->description,
                    'image' => getFile($data),
                    "is_box" => $data->is_box,
                    "box_price" => $data->box_price,
                    "box_quantity" => $data->box_quantity,
                    "price" => $data->price,
                    "quantity" => $data->quantity,
                ];
            }),
            

        ];
    }
}
