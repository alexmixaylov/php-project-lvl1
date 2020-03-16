<?php

namespace BrainGames\games\even;

use function BrainGames\common\calcRightAnswer;
use function BrainGames\common\play;

function init()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';

    $initGameParams = function () {
        $question    = rand(1, 10);
        $rightAnswer = isEven($question) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };

    play($gameDescription, $initGameParams);
}

function isEven(int $number)
{
    return $number % 2 == 0;
}
