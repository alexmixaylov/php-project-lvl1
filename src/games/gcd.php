<?php

namespace BrainGames\games\gcd;

use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;

function run($userName)
{
    $rules = function () {
        $number1  = getRandomNumber(10);
        $number2  = getRandomNumber(20);
        $question = "{$number1} {$number2}";

        $answer = nodCalc($number1, $number2);

        return makeResponse($question, $answer);
    };

    play($rules, $userName);
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
