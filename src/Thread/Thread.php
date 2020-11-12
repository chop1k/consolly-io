<?php

namespace Consolly\IO\Thread;

use Consolly\IO\Exception\InputException;
use Consolly\IO\Exception\OutException;

class Thread
{
    public const Out = 'php://stdout';
    public const In = 'php://stdin';
    public const Err = 'php://stderr';

    public static function write(string $data, string $thread): int
    {
        $result = file_put_contents($thread, $data);

        if ($result === false)
        {
            throw new OutException(sprintf('Cannot write to %s', $thread));
        }

        return $result;
    }

    public static function read(string $thread): string
    {
        $data = file_get_contents($thread);

        if ($data === false)
        {
            throw new InputException(sprintf('Cannot read from %s', $thread));
        }

        return $data;
    }
}