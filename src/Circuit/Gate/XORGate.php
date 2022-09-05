<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace KPC\Circuit\Gate;

class XORGate extends AbstractGate implements Gate
{
    public function update(Input $input)
    {
        $this->output->update(! ((! $input->getA() && ! $input->getB()) || ($input->getA() && $input->getB())));
    }
}
