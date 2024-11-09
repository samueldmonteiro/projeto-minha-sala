<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Student extends Model
{
    protected $fillable = [
        'course_id',
        'semester',
        'RA',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'entity');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
