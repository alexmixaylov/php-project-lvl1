<?php

namespace BrainGames\games\even;

use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;

function run($userName)
{
    $rules = function () {
        $question = getRandomNumber();
        $answer = isEven($question) ? 'yes' : 'no';

        return makeResponse($question, $answer);
    };
    play($rules, $userName);
}

function isEven(int $number)
{
    return $number % 2 == 0;
}
