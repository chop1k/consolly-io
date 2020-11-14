<?php

namespace Consolly\IO\Output;

use Consolly\IO\Exception\OutException;
use Consolly\IO\Thread\Thread;

/**
 * Class Out is shortcut for operations with output
 *
 * @package Consolly\IO\Output
 */
class Out
{
    /**
     * Writes given data to thread and appends new line character to end
     *
     * @param string $data
     * Data to write
     *
     * @return int
     * Returns number of bytes written to thread
     *
     * @throws OutException
     * Throws when thread not available
     */
    public static function log(string $data): int
    {
        return Thread::write($data.PHP_EOL, Thread::Out);
    }

    /**
     * Writes given data to thread
     *
     * @param string $data
     * Data to write
     *
     * @return int
     * Returns number of bytes written to thread
     *
     * @throws OutException
     * Throws when thread not available
     */
    public static function write(string $data): int
    {
        return Thread::write($data, Thread::Out);
    }
}