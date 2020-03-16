<?php

namespace BrainGames\games\progression;

use function BrainGames\common\calcRightAnswer;
use function BrainGames\common\play;

function init()
{
    $gameDescription = 'What number is missing in the progression?';

    $rules = function () {
        $beginProgression   = rand(1, 10);
        $diffProgression    = rand(1, 5);
        $lengthProgression  = 10;
        $indexHiddenElement = rand(0, $lengthProgression - 1);

        $progression = createProgression(
            $beginProgression,
            $diffProgression,
            $lengthProgression
        );
        $question    = createQuestion($progression, $indexHiddenElement);
        $rightAnswer = $progression[$indexHiddenElement];

        return calcRightAnswer($question, $rightAnswer);
    };

    play($gameDescription, $rules);
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
