<?php

namespace BrainGames\games\even;

use function BrainGames\common\getRandomNumber;
use function BrainGames\common\createResponse;
use function BrainGames\common\play;

function run($userName)
{
    $rules = function () {
        $question = getRandomNumber();
        $rightAnswer = isEven($question) ? 'yes' : 'no';

        return createResponse($question, $rightAnswer);
    };
    play($rules, $userName);
}

function isEven(int $number)
{
    return $number % 2 == 0;
}
