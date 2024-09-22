<?php

namespace App\Models;

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
}
