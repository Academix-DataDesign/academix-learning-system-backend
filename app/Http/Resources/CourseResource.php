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
            'category' => $this->category->name,
            'status' => $this->status->name,
            'language' => $this->language->name,
            'instructor' => $this->user->name,
            'level' => $this->level->name,
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail_path' => $this->thumbnail_path,
            'duration' => $this->duration,
            'wishes' => $this->wishes,
            'price' => $this->price,
            'certification' => $this->certification,
            //'bestseller' => $this->bestseller,
        ];
    }
}
