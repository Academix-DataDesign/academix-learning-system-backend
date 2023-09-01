<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CourseResource;

class CategoryAppResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
            'courses' => CourseResource::collection($this->courses),
        ];
    }
}
