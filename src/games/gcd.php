<?php

namespace BrainGames\games\gcd;

use function BrainGames\common\greetAndGetUsername;
use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;

function run()
{
    $userName = greetAndGetUsername('Find the greatest common divisor of given numbers.');

    $rules = function () {
        $number1  = getRandomNumber(50);
        $number2  = getRandomNumber(100);
        $question = "{$number1} {$number2}";

        $answer = nodCalc($number1, $number2);

        return makeResponse($question, $answer);

    };

    play($rules, $userName);
}

function nodCalc($x, $y) {
    if ($x > $y) {
        return nodCalc(($x - $y), $y);
    }
    if ($x < $y) {
        return nodCalc(($y - $x), $x);
    }
    return $x;
}
