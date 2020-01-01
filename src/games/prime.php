<?php

namespace BrainGames\games\prime;

use function BrainGames\games\common\greetAndGetUsername;
use function BrainGames\games\common\getRandomNumber;
use function BrainGames\games\common\makeResponse;
use function BrainGames\games\common\play;

function run()
{
    $userName = greetAndGetUsername('Answer "yes" if given number is prime. Otherwise answer "no".');

    $rules = function () {
        $number   = getRandomNumber(13);
        $question = $number;
        $isPrime  = isPrime($number);
        $answer   = $isPrime ? 'yes' : 'no';

        return makeResponse($question, $answer);
    };

    play($rules, $userName);
}

function isPrime($num)
{
    if($num == 2){
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
