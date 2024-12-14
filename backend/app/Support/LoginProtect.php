<?php

namespace App\Support;

use App\Log\LoginAttemptLog;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;

class LoginProtect
{
    public int $maxAttempts;
    public int $blockDuration;
    public string $redisKey;
    public string $ip;

    public function __construct(int $maxAttempts = 5, int $blockDuration = 15 * 60)
    {
        $this->maxAttempts = $maxAttempts;
        $this->blockDuration = $blockDuration;

        $ip = Request::ip();
        $this->ip = $ip;
        $this->redisKey = "failed_login_attempts:{$ip}";
    }

    public function recordFailedAttempt(): void
    {
        $attempts = Redis::incr($this->redisKey);

        if ($attempts === 1) {
            Redis::expire($this->redisKey, $this->blockDuration);
        }
    }

    public function randomBlock(): bool
    {
        if ($this->attempts() < $this->maxAttempts) {
            return false;
        }

        Redis::setex("blocked_ip:{$this->ip}", $this->blockDuration, true);
        Redis::del($this->redisKey);

        (new LoginAttemptLog)->loginBlocked("IP bloqueado: {$this->ip}");

        return true;
    }

    public function attempts(): ?int
    {
        return Redis::get($this->redisKey);
    }

    public function isBlocked(): bool
    {
        return (bool) Redis::get("blocked_ip:{$this->ip}");
    }
}
