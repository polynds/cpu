<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Components\Gate;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class GateTest extends TestCase
{
    public function testANDGate()
    {
        $combinations = [
            [false, false, false],
            [true, false, false],
            [false, true, false],
            [true, true, true],
        ];
        foreach ($combinations as $combination) {
            $gate = new ANDGate();
            $gate->update((new Input())->setA($combination[0])->setB($combination[1]));
            $this->assertTrue($gate->output() == $combination[2]);
        }
    }

    public function testNANDGate()
    {
        $combinations = [
            [false, false, true],
            [true, false, true],
            [false, true, true],
            [true, true, false],
        ];
        foreach ($combinations as $combination) {
            $gate = new NANDGate();
            $gate->update((new Input())->setA($combination[0])->setB($combination[1]));
            $this->assertTrue($gate->output() == $combination[2]);
        }
    }

    public function testORGate()
    {
        $combinations = [
            [false, false, false],
            [true, false, true],
            [false, true, true],
            [true, true, true],
        ];
        foreach ($combinations as $combination) {
            $gate = new ORGate();
            $gate->update((new Input())->setA($combination[0])->setB($combination[1]));
            $this->assertTrue($gate->output() == $combination[2]);
        }
    }

    public function testNOTGate()
    {
        $combinations = [
            [false, true],
            [true, false],
        ];
        foreach ($combinations as $combination) {
            $gate = new NOTGate();
            $gate->update((new Input())->setA($combination[0]));
            $this->assertTrue($gate->output() == $combination[1]);
        }
    }

    public function testXORGate()
    {
        $combinations = [
            [false, false, false],
            [true, false, true],
            [false, true, true],
            [true, true, false],
        ];
        foreach ($combinations as $combination) {
            $gate = new XORGate();
            $gate->update((new Input())->setA($combination[0])->setB($combination[1]));
            $this->assertTrue($gate->output() == $combination[2]);
        }
    }

    public function testNORGate()
    {
        $combinations = [
            [false, false, true],
            [true, false, false],
            [false, true, false],
            [true, true, false],
        ];
        foreach ($combinations as $combination) {
            $gate = new NORGate();
            $gate->update((new Input())->setA($combination[0])->setB($combination[1]));
            $this->assertTrue($gate->output() == $combination[2]);
        }
    }
}
