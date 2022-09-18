<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class ClientVisitCollection extends ResourceCollection
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
                    'client_id' => $data->id,
                    'client_name' => $data->client->name,
                    'visit_text' => $data->text,
                    'time' => $data->created_at->format('H:i A'),

                ];
            }),

        ];
    }
}
