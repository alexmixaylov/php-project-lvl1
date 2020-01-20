<?php

namespace BrainGames\games\gcd;

use function BrainGames\greeting\greetAndReturnName;
use function BrainGames\common\createResponse;
use function BrainGames\common\play;

function init()
{
    $userName = greetAndReturnName('Find the greatest common divisor of given numbers.');
    run($userName);
    return false;
}

function run($userName)
{
    $initRules = function () {
        $number1  = rand(1, 10);
        $number2  = rand(1, 20);
        $question = "{$number1} {$number2}";

        $rightAnswer = nodCalc($number1, $number2);

        return createResponse($question, $rightAnswer);
    };

    play($initRules, $userName);
}

function nodCalc($x, $y)
{
    if ($x > $y) {
        return nodCalc(($x - $y), $y);
    }
    if ($x < $y) {
        return nodCalc(($y - $x), $x);
    }
    return $x;
}
