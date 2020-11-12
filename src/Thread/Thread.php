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

    public static function read(string $thread, bool $block): string
    {
        $stream = fopen($thread, 'r');

        $blockResult = stream_set_blocking($stream, $block);

        if (!$blockResult)
        {
            throw new InputException('Cannot block stream');
        }

        $data = stream_get_contents($stream);

        if ($data === false)
        {
            throw new InputException(sprintf('Cannot read from %s', $thread));
        }

        return $data;
    }
}