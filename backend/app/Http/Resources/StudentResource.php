<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $avatar =  Storage::url($this->user->avatar);
        $avatar = str_replace('/api', '', $avatar);

        return [
            'id' => $this->id,
            'name' => $this->user->name,
            'RA' => $this->RA,
            'semester' => $this->semester,
            'course' => $this->course->name,
            'avatar' => $avatar,
            'blocked' => $this->user->blocked,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
