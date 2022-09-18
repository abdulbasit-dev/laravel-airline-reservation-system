<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class WorkTimeCollection extends ResourceCollection
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
            'message' => __('api.user_work_time'),
            'status' => Response::HTTP_OK,
            'total' => $this->collection->count(),
            'data' => $this->collection->map(function ($data) {
                return  [
                    "total_time" => gmdate("H:i:s", $data->sum("total_time")),
                ];
            }),

        ];
    }
}
