<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends User
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'semester',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->user->name,
        );
    }


    protected function email(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->user->email,
        );
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->user->password,
        );
    }
}
