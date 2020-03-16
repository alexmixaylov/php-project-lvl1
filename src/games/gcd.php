<?php

namespace BrainGames\games\gcd;

use function BrainGames\common\play;

function init()
{
    $gameDescription =  'Find the greatest common divisor of given numbers.';

    $initGameParams = function () {
        $number1  = rand(1, 10);
        $number2  = rand(1, 20);
        $question = "{$number1} {$number2}";

        $rightAnswer = calcMaxDivisor($number1, $number2);

        return [$question, $rightAnswer];
    };

    play($gameDescription, $initGameParams);
}

function calcMaxDivisor($x, $y)
{
    if ($x > $y) {
        return calcMaxDivisor(($x - $y), $y);
    }
    if ($x < $y) {
        return calcMaxDivisor(($y - $x), $x);
    }
    return $x;
}
