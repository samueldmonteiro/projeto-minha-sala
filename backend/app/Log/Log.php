<?php

namespace App\Log;

use Illuminate\Support\Facades\Log as LaravelLog;

class Log
{
    /**
     * @param string $message
     * @param array $content
     * @param string $logType error|warning|info|debug
     * @return void
     */
    public function save(string $message, array $content = [], string $logType = 'info'): void
    {
        LaravelLog::channel('log')->${$logType}($message, $content);
    }
}
