<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Components\Gate;

use KPC\Components\Wire;

abstract class AbstractGate
{
    protected Wire $output;

    public function __construct()
    {
        $this->output = new Wire('0', false);
    }

    public function output(): bool
    {
        return $this->output->getValue();
    }
}
