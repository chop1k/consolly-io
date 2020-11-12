<?php

namespace Consolly\IO\Input;

use Consolly\IO\Thread\Thread;

class In
{
    public static function input(): string
    {
        return Thread::read(Thread::In, true);
    }

    public static function read(): string
    {
        return Thread::read(Thread::In, false);
    }
}