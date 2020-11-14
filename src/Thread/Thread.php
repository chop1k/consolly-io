<?php

namespace Consolly\IO\Thread;

use Consolly\IO\Exception\InputException;
use Consolly\IO\Exception\OutException;

/**
 * Class Thread contains main functional for input/output operations
 *
 * @package Consolly\IO\Thread
 */
class Thread
{
    public const Out = 'php://stdout';
    public const In = 'php://stdin';
    public const Err = 'php://stderr';

    /**
     * Writes data to given thread
     *
     * @param string $data
     * Data to write
     *
     * @param string $thread
     * Thread to write
     *
     * @return int
     * Returns number of bytes written to thread
     *
     * @throws OutException
     * Throws when thread not available
     */
    public static function write(string $data, string $thread): int
    {
        $result = file_put_contents($thread, $data);

        if ($result === false)
        {
            throw new OutException(sprintf('Cannot write to %s', $thread));
        }

        return $result;
    }

    /**
     * Reads data from given thread
     *
     * @param string $thread
     * Thread to read
     *
     * @param bool $block
     * If true thread will be blocked before reading
     *
     * @return string
     *
     * @throws InputException
     * Throws when thread cannot be read
     */
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