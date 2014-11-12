<?php
namespace Infusionsoft;

use Psr\Log\LoggerTrait;
use Psr\Log\LoggerInterface;

/**
 * Stores all log messages in an array
 */
class ArrayLogger implements LoggerInterface
{
    use LoggerTrait;

    protected $logs;

    public function __construct()
    {
        $this->logs = [];
    }

    public function log($level, $message, array $context = [])
    {
        $this->logs[] = [
            'message' => $message,
            'level' => $level,
            'context' => $context
        ];
    }

    /**
     * Get logged entries
     *
     * @return array
     */
    public function getLogs()
    {
        return $this->logs;
    }

    /**
     * Clears logged entries
     */
    public function clearLogs()
    {
        $this->logs = [];
    }
}