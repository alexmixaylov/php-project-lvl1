<?php

namespace BrainGames\games\even;

use function BrainGames\greeting\greetAndReturnName;
use function BrainGames\common\createResponse;
use function BrainGames\common\play;

function init()
{
    $userName = greetAndReturnName('Answer "yes" if the number is even, otherwise answer "no".');
    run($userName);
    return false;
}

function run($userName)
{
    $initRules = function () {
        $question = rand(1, 10);
        $rightAnswer = isEven($question) ? 'yes' : 'no';

        return createResponse($question, $rightAnswer);
    };
    play($initRules, $userName);
}

function isEven(int $number)
{
    return $number % 2 == 0;
}
