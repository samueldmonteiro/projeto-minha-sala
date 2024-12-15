<?php

namespace App\Log;

use Illuminate\Support\Facades\Log as LaravelLog;
use Illuminate\Support\Facades\Request;

class LoginAttemptLog
{
    /**
     * @param string $message prefixo na mensagem: [incorrect login] - $message
     * @param array $context já possui o ip armazenado
     * @return void
     */
    public function incorrect(string $message, array $context = []): void
    {
        $messageDefault = "[incorrect login] - ";
        $contextDefault = ['IP' => Request::header('X-Real-IP')];

        $newMessage = $messageDefault . $message;
        $newCoxtent = array_merge($contextDefault, $context);

        LaravelLog::channel('login_attempts')->warning($newMessage, $newCoxtent);
    }

    /**
     * @param string $message [logged] - $message
     * @param array $context
     * @return void
     */
    public function success(string $message, array $context = []): void
    {
        $newMessage = "[logged] - " . $message;

        LaravelLog::channel('login_attempts')->info($newMessage, $context);
    }

     /**
     * @param string $message prefixo na mensagem: [incorrect login] - $message
     * @param array $context já possui o ip armazenado
     * @return void
     */
    public function loginBlocked(string $message, array $context = []): void
    {
        $messageDefault = "[blocked] - ";
        $contextDefault = ['IP' => Request::header('X-Real-IP')];

        $newMessage = $messageDefault . $message;
        $newCoxtent = array_merge($contextDefault, $context);

        LaravelLog::channel('login_attempts')->warning($newMessage, $newCoxtent);
    }
}
