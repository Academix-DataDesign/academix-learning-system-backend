<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'category' => $this->category->name ?? null,
            'status' => $this->status->name ?? null,
            'language' => $this->language->name ?? null,
            'instructor' => $this->instructor->name ?? null,
            'level' => $this->level->name ?? null,
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail_path' => $this->thumbnail_path,
            'duration' => $this->duration,
            'wishes' => $this->wishes,
            'price' => $this->price,
            'certification' => $this->certification && true,
            'bestseller' => $this->bestseller && true,
        ];
    }
}