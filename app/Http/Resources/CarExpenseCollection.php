<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class CarExpenseCollection extends ResourceCollection
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
            'message' =>  __('api.all_resource', ['resource' => __('attributes.car_expense')]),
            'status' => Response::HTTP_OK,
            "total" => $this->collection->count(),
            'data' => $this->collection->map(function ($data) {
                return [
                    'id' => $data->id,
                    'user_id' => $data->user_id,
                    'title' => $data->title,
                    'description' => $data->description,
                    'price' => $data->price,
                    'created_at' => $data->created_at,
                    'image' => getFile($data),
                ];
            }),

        ];
    }
}
