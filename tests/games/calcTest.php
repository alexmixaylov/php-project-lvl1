<?php

namespace Php\Package\Tests;

use PHPUnit\Framework\TestCase;
use function BrainGames\games\calc\calcExpression;

class calcTest extends TestCase
{
    public function testCalcExpression()
    {
        $this->assertEquals(6, calcExpression('*', 2, 3));
        $this->assertEquals(5, calcExpression('+', 2, 3));
        $this->assertEquals(10, calcExpression('-', 12, 2));
    }
}
