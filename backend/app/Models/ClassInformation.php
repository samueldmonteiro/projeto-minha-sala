<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'semester',
        'room',
        'block',
        'floor',
        'day',
        'teacher_name',
        'start_time',
        'end_time',
        'subject'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::createFromFormat('H:i:s', $value)->format('H:i'),
        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::createFromFormat('H:i:s', $value)->format('H:i'),
        );
    }
}
