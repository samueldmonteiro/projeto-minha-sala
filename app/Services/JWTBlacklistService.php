<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class JWTBlacklistService
{
    protected $prefix = 'blacklist:';

    public function addToBlacklist($token, $expiration)
    {
        $key = $this->prefix . $token;
        Redis::set($key, 'blacklisted');
        Redis::expireat($key, $expiration);
    }

    public function isBlacklisted($token)
    {
        return Redis::exists($this->prefix . $token);
    }
}