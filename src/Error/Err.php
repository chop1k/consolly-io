<?php

namespace Consolly\IO\Error;

use Consolly\IO\Exception\OutException;
use Consolly\IO\Thread\Thread;

/**
 * Class Err is shortcut for operations with error thread
 *
 * @package Consolly\IO\Error
 */
class Err
{
    /**
     * Writes data to error thread
     *
     * @param string $data
     *
     * @return int
     * Returns number of bytes written to thread
     *
     * @throws OutException
     * Throws when thread not available
     */
    public static function write(string $data): int
    {
        return Thread::write($data, Thread::Err);
    }
}