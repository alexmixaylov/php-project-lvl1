<?php

namespace BrainGames\games\prime;

use function BrainGames\common\greetAndGetUsername;
use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;

function run()
{
    $userName = greetAndGetUsername('Answer "yes" if given number is prime. Otherwise answer "no".');

    $rules = function () {
        $number   = getRandomNumber(59);
        $question = $number;
        $isPrime  = isPrime($number);
        $answer   = $isPrime ? 'yes' : 'no';

        return makeResponse($question, $answer);
    };

    play($rules, $userName);
}

function isPrime($num)
{
    $minPrimeNumber = 2;

    if ($num == $minPrimeNumber) {
        return true;
    }

    if ($num % 2 == 0 || $num == 1) {
        return false;
    }

    for ($d = 3; $d < $num; $d = $d + 2) {
        if ($num % $d == 0) {
            return false;
        }
    }

    return true;
}
