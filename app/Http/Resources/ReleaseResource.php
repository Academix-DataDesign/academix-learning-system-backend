<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReleaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'instructor' => $this->instructor->name ?? null,
            'title' => $this->title ?? null,
            'link' => $this->link ?? null,
            'date' => $this->date ?? null,
        ];
    }
}