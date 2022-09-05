<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Circuit;

class Wire
{
    protected string $name;

    protected bool $value;

    public function __construct(string $name, bool $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): bool
    {
        return $this->value;
    }

    public function update(bool $value): Wire
    {
        $this->value = $value;
        return $this;
    }
}
