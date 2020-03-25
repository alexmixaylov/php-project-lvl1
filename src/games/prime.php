<?php

namespace BrainGames\games\prime;

use function BrainGames\common\play;

define('MIN_PRIME_NUMBER', 2);

function init()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $generateGameData = function () {
        $question    = rand(1, 13);
        $rightAnswer = isPrime($question) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };

    play($gameDescription, $generateGameData);
}

function isPrime($num)
{
    $maxValue = $num / 2;

    if ($num === MIN_PRIME_NUMBER) {
        return true;
    }

    if ($num % 2 == 0 || $num < MIN_PRIME_NUMBER) {
        return false;
    }

    for ($divider = MIN_PRIME_NUMBER + 1, $period = 2; $divider < $maxValue; $divider = $divider + $period) {
        if ($num % $divider == 0) {
            return false;
        }
    }

    return true;
}
