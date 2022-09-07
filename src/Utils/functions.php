<?php

declare(strict_types=1);
/**
 * happy coding.
 */
function loop(int $times, callable $call)
{
    for ($i = 0; $i < $times; ++$i) {
        $call($i);
    }
}
