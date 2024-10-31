<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $avatar =  Storage::url($this->user->avatar);
        $avatar = str_replace('/api', '', $avatar);

        return [
            'id' => $this->id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'blocked' => $this->user->blocked,
            'avatar' => $avatar,
            'type' => $this->user->type,
            
            'course' => $this->course,
            'shift' => $this->shift,
            'semester' => $this->semester,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
