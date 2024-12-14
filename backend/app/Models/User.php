<?php

namespace App\Models;

use App\Http\Resources\AdminResource;
use App\Http\Resources\StudentResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'type',
        'avatar',
        'blocked'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function entity(): MorphTo
    {
        return $this->morphTo();
    }

    public function entityResource(): mixed
    {
        switch ($this->entity_type) {
            case Student::class:
                return new StudentResource($this->entity);
                break;
            case Admin::class:
                return new AdminResource($this->entity);
                break;
            default:
                return null;
        }
    }

    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): mixed
    {
        return [];
    }
}
