<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class StandCollection extends ResourceCollection
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
            'message' =>  __('api.all_resource', ['resource' => __('attributes.stands')]),
            'status' => Response::HTTP_OK,
            "total" => $this->collection->count(),
            'data' => $this->collection->map(function ($data) {
                return [
                    'client_id' => $data->id,
                    'user_name' => $data->user->name,
                    'client_name' => $data->client->name,
                    'stand_text' => $data->text,
                    'time' => $data->created_at->format('H:i A'),
                    'created_at' => $data->created_at,
                    'image' => getFile($data),
                ];
            }),

        ];
    }
}
