<?php

namespace Php\Package\Tests;

use PHPUnit\Framework\TestCase;
use BrainGames\games\calc;

class calcTest extends TestCase
{
    public function testCalcExpression()
    {
        $this->assertEquals(6, calc\calcExpression('*', 2, 3 ));
        $this->assertEquals(5, calc\calcExpression('+', 2, 3 ));
        $this->assertEquals(10, calc\calcExpression('-', 12, 2 ));
    }
}
