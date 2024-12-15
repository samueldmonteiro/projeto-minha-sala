<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassInformationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'semester' => $this->semester,
            'room' => $this->room,
            'block' => $this->block,
            'floor' => $this->floor,
            'day' => $this->day,
            'teacher_name' => $this->teacher_name,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'subject' => $this->subject,
            'course' => $this->course->name
        ];
    }
}
