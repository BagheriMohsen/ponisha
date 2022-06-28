<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable
    {
        return $this->collection->map(function ($item) {
            return [
                'user' => new UserDetailResource($item->user),
                'title' => $item->title,
                'answers' => $item->answers
            ];
        });
    }
}
