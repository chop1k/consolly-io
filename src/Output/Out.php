<?php

namespace Consolly\IO\Output;

use Consolly\IO\Thread\Thread;

class Out
{
    public static function write(string $data): int
    {
        return Thread::write($data, Thread::Out);
    }
}