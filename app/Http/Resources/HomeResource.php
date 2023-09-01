<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'usersCount' => $this->userCount,
            'instructorCount' => $this->instructorCount,
            'lessons' => $this->lessons,
            'hours' => $this->hours,
            'featuredCategories' => $this->featuredCategories,
            'topComments' => $this->topComments,
        ];
    }
}
