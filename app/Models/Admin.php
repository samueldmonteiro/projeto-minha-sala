<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
