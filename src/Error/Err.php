<?php

namespace Consolly\IO\Error;

use Consolly\IO\Thread\Thread;

class Err
{
    public static function write(string $data): int
    {
        return Thread::write($data, Thread::Err);
    }
}