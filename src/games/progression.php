<?php

namespace BrainGames\games\progression;

use function BrainGames\common\play;

function init()
{
    $gameDescription = 'What number is missing in the progression?';

    $generateGameData = function () {
        $begin   = rand(1, 10);
        $diff    = rand(1, 5);
        $length  = 10;
        $indexHiddenElement = rand(0, $length - 1);

        $progression = createProgression($begin, $diff, $length);
        $question    = createQuestion($progression, $indexHiddenElement);
        $rightAnswer = $progression[$indexHiddenElement];

        return [$question, $rightAnswer];
    };

    play($gameDescription, $generateGameData);
}

function createProgression(int $begin, int $diff, int $length): array
{
    $result = [];
    for ($i = 0; $i < $length; $i++) {
        $result[$i] = $begin + $diff * $i;
    }

    return $result;
}

function createQuestion(array $progression, int $index): string
{
    $progression[$index] = '.';

    return implode($progression, ' ');
}
