<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Admin extends Model
{

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'email',
        'password'
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'entity');
    }
}
