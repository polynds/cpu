<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Components\Gate;

class Input
{
    public const A = 0;

    public const B = 1;

    public const C = 2;

    public const D = 3;

    public const E = 4;

    public const F = 5;

    /**
     * @var bool[]
     */
    protected array $values = [];

    public function getA(): ?bool
    {
        return $this->values[self::A] ?? null;
    }

    public function getB(): ?bool
    {
        return $this->values[self::B] ?? null;
    }

    public function getC(): ?bool
    {
        return $this->values[self::C] ?? null;
    }

    public function getD(): ?bool
    {
        return $this->values[self::D] ?? null;
    }

    public function getE(): ?bool
    {
        return $this->values[self::E] ?? null;
    }

    public function getF(): ?bool
    {
        return $this->values[self::F] ?? null;
    }

    public function setA(bool $value): self
    {
        $this->values[self::A] = $value;
        return $this;
    }

    public function setB(bool $value): self
    {
        $this->values[self::B] = $value;
        return $this;
    }

    public function setC(bool $value): self
    {
        $this->values[self::C] = $value;
        return $this;
    }

    public function setD(bool $value): self
    {
        $this->values[self::D] = $value;
        return $this;
    }

    public function setE(bool $value): self
    {
        $this->values[self::E] = $value;
        return $this;
    }

    public function setF(bool $value): self
    {
        $this->values[self::F] = $value;
        return $this;
    }
}
