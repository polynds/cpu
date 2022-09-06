<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Components\Adder;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class AdderTest extends TestCase
{
    public function testHalfAdder()
    {
        $a = new HalfAdder();

        $a->update(true, true, false);
        $this->assertTrue($a->sum() == false);
        $this->assertTrue($a->carry() == true);

        $a->update(true, false, false);
        $this->assertTrue($a->sum() == true);
        $this->assertTrue($a->carry() == false);

        $a->update(false, false, true);
        $this->assertTrue($a->sum() == true);
        $this->assertTrue($a->carry() == false);

        $a->update(true, true, true);
        $this->assertTrue($a->sum() == true);
        $this->assertTrue($a->carry() == true);

        $a->update(true, false, true);
        $this->assertTrue($a->sum() == false);
        $this->assertTrue($a->carry() == true);
    }
}
