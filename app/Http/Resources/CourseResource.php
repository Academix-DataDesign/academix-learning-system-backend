<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            'id' => $this->id,
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
            'isPurchased' => $this->isPurchased ?? false,
            'sameInstructor' => $this->instructor->courses()->where('courses.id', '!=', $this->id)->get(),
        ];
    }
}
