<?php

namespace BrainGames\games\gcd;

use function BrainGames\engine\play;

function init()
{
    $gameDescription =  'Find the greatest common divisor of given numbers.';

    $generateGameData = function () {
        $number1  = rand(1, 10);
        $number2  = rand(1, 20);
        $question = "{$number1} {$number2}";

        $rightAnswer = calcGcd($number1, $number2);

        return [$question, $rightAnswer];
    };

    play($gameDescription, $generateGameData);
}

function calcGcd($x, $y)
{
    if ($x > $y) {
        return calcGcd(($x - $y), $y);
    }
    if ($x < $y) {
        return calcGcd(($y - $x), $x);
    }
    return $x;
}
