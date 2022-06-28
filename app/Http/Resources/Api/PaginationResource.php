<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class PaginationResource extends JsonResource
{

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Support\Collection
     */
    #[ArrayShape(['total_records' => "int", 'per_page' => "int", 'current_page' => "int", 'total_pages' => "int"])]
    public function toArray($request): array|\Illuminate\Support\Collection
    {
        return [
            'total_records' => $this->total(),
            'per_page' => (int)$this->perPage(),
            'current_page' => $this->currentPage(),
            'total_pages' => $this->lastPage()
        ];
    }
}
