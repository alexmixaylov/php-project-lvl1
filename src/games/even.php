<?php

namespace BrainGames\games\even;

use function BrainGames\engine\play;

function init()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';

    $generateGameData = function () {
        $question    = rand(1, 10);
        $rightAnswer = isEven($question) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };

    play($gameDescription, $generateGameData);
}

function isEven(int $number)
{
    return $number % 2 == 0;
}
