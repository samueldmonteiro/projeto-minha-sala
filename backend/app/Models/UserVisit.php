<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'last_visit',
        'total_visits'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
