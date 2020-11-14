<?php

namespace Consolly\IO\Input;

use Consolly\IO\Exception\InputException;
use Consolly\IO\Thread\Thread;

/**
 * Class In is shortcut for operations with input
 *
 * @package Consolly\IO\Input
 */
class In
{
    /**
     * Reads data from thread, if no data it will wait for input (if thread is stdin)
     *
     * @return string
     *
     * @throws InputException
     * Throws when thread cannot be read
     */
    public static function input(): string
    {
        return Thread::read(Thread::In, true);
    }

    /**
     * Reads data from thread, if no data then will be returned empty string
     *
     * @return string
     *
     * @throws InputException
     * Throws when thread cannot be read
     */
    public static function read(): string
    {
        return Thread::read(Thread::In, false);
    }
}