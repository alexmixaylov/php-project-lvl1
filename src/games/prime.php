<?php

namespace BrainGames\games\prime;

use function BrainGames\common\calcRightAnswer;
use function BrainGames\common\play;

function init()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $rules = function () {
        $question    = rand(1, 13);
        $rightAnswer = isPrime($question) ? 'yes' : 'no';

        return calcRightAnswer($question, $rightAnswer);
    };

    play($gameDescription, $rules);
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
