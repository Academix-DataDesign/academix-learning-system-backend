<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'course' => $this->course->title ?? null,
            'student' => $this->student->name ?? null,
            'title' => $this->title ?? null,
            'body' => $this->body ?? null,
        ];
    }
}
