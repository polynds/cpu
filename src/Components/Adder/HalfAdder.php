<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Components\Adder;

use KPC\Components\Gate\ANDGate;
use KPC\Components\Gate\Input;
use KPC\Components\Gate\ORGate;
use KPC\Components\Gate\XORGate;
use KPC\Components\Wire;

class HalfAdder
{
    protected Wire $inputA;

    protected Wire $inputB;

    protected Wire $carryIn;

    protected XORGate $xor1;

    protected XORGate $xor2;

    protected ANDGate $and1;

    protected ANDGate $and2;

    protected ORGate $or1;

    protected Wire $carryOut;

    protected Wire $sumOut;

    public function __construct()
    {
        $this->inputA = new Wire('a', false);
        $this->inputB = new Wire('b', false);
        $this->carryIn = new Wire('c', false);
        $this->carryOut = new Wire('co', false);
        $this->sumOut = new Wire('so', false);

        $this->xor1 = new XORGate();
        $this->xor2 = new XORGate();
        $this->and1 = new ANDGate();
        $this->and2 = new ANDGate();
        $this->or1 = new ORGate();
    }

    public function update(bool $inputA, bool $inputB, bool $carryIn)
    {
        $this->inputA->update($inputA);
        $this->inputB->update($inputB);
        $this->carryIn->update($carryIn);

        $this->xor1->update((new Input())->setA($this->inputA->getValue())->setB($this->inputB->getValue()));
        $this->xor2->update((new Input())->setA($this->xor1->output())->setB($this->carryIn->getValue()));

        $this->sumOut->update($this->xor2->output());

        $this->and1->update((new Input())->setA($this->carryIn->getValue())->setB($this->xor1->output()));
        $this->and2->update((new Input())->setA($this->inputA->getValue())->setB($this->inputB->getValue()));

        $this->or1->update((new Input())->setA($this->and1->output())->setB($this->and2->output()));

        $this->carryOut->update($this->or1->output());
    }

    public function sum(): bool
    {
        return $this->sumOut->getValue();
    }

    public function carry(): bool
    {
        return $this->carryOut->getValue();
    }
}
