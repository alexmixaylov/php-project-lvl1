<?php

namespace BrainGames\games\prime;

use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;

function run($userName)
{
    $rules = function () {
        $question = getRandomNumber(13);
        $rightAnswer   = isPrime($question) ? 'yes' : 'no';

        return makeResponse($question, $rightAnswer);
    };
    play($rules, $userName);
}

function isPrime($num)
{
    $minPrimeNumber = 2;
    $maxPrimeNumber = $num / 2;

    if ($num === $minPrimeNumber) {
        return true;
    }

    if ($num % 2 == 0 || $num < $minPrimeNumber) {
        return false;
    }

    for ($d = $minPrimeNumber + 1, $period = 2; $d < $maxPrimeNumber; $d = $d + $period) {
        if ($num % $d == 0) {
            return false;
        }
    }

    return true;
}
