<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Components;

interface Component
{
    public function connectOutput(Component $component);

    public function setInputWire(int $index, bool $value);

    public function getOutputWire(int $index, bool $value);
}
