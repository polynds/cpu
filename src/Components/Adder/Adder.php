<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Components\Adder;

use KPC\Components\Component;
use KPC\Components\Wire;

class Adder implements Component
{
    /**
     * @var Wire[]
     */
    protected array $inputs = [];

    protected Wire $carryIn;

    /**
     * @var HalfAdder[]
     */
    protected array $halfAdders = [];

    protected Wire $carryOut;

    /**
     * @var Wire[]
     */
    protected array $outputs = [];

    protected Component $next;

    public function __construct()
    {
        $this->carryIn = new Wire('ci', false);
        $this->carryOut = new Wire('co', false);

        loop(32, function ($index) {
            $this->inputs[$index] = new Wire($index, false);
        });
        loop(16, function ($index) {
            $this->halfAdders[$index] = new HalfAdder();
        });
        loop(16, function ($index) {
            $this->outputs[$index] = new Wire($index, false);
        });
    }

    public function connectOutput(Component $component)
    {
        $this->next = $component;
    }

    public function setInputWire(int $index, bool $value)
    {
        $this->inputs[$index]->update($value);
    }

    public function getOutputWire(int $index, bool $value): bool
    {
        return $this->outputs[$index]->getValue();
    }

    public function update(bool $carryIn)
    {
        $this->carryIn->update($carryIn);

        $awire = 31;
        $bwire = 15;
        for ($i = count($this->halfAdders) - 1; $i >= 0; --$i) {
            $aval = $this->inputs[$awire]->getValue();
            $bval = $this->inputs[$bwire]->getValue();

            $this->halfAdders[$i]->update($aval, $bval, $this->carryIn->getValue());
            $this->outputs[$i]->update($this->halfAdders[$i]->sum());
            $this->carryOut->update($this->halfAdders[$i]->carry());
            $this->carryIn->update($this->halfAdders[$i]->carry());
            --$awire;
            --$bwire;
        }
    }
}
