<?php

namespace BrainGames\games\even;

use function BrainGames\common\calcRightAnswer;
use function BrainGames\common\play;

function init()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';

    $rules = function () {
        $question    = rand(1, 10);
        $rightAnswer = isEven($question) ? 'yes' : 'no';

        return calcRightAnswer($question, $rightAnswer);
    };

    play($gameDescription, $rules);
}

function isEven(int $number)
{
    return $number % 2 == 0;
}
