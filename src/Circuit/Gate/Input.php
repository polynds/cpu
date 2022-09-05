<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Circuit\Gate;

/**
 * @method getA(): ?bool
 * @method getB(): ?bool
 * @method getC(): ?bool
 * @method getD(): ?bool
 * @method getE(): ?bool
 * @method getF(): ?bool
 * @method setA(bool $value): ?bool
 * @method setB(bool $value): ?bool
 * @method setC(bool $value): ?bool
 * @method setD(bool $value): ?bool
 * @method setE(bool $value): ?bool
 * @method setF(bool $value): ?bool
 */
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

    public function __set(string $name, $value)
    {
        return $this->values[$name] ?? null;
    }

    public function __get(string $name)
    {
        return $this->values[$name] ?? null;
    }
}
