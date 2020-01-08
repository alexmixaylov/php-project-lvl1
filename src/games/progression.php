<?php

namespace BrainGames\games\progression;

use function BrainGames\common\getRandomNumber;
use function BrainGames\common\createResponse;
use function BrainGames\common\play;

function run($userName)
{
    $rules = function () {
        $diffProgression    = getRandomNumber(5);
        $lengthProgression  = 10;
        $hiddenElementIndex = getRandomNumber() - 1;

        $progression = createProgression($diffProgression, $lengthProgression);
        $question    = createQuestion($progression, $hiddenElementIndex);
        $rightAnswer      = $progression[$hiddenElementIndex];

        return createResponse($question, $rightAnswer);
    };

    play($rules, $userName);
}

function createProgression(int $diff, int $length): array
{
    $result = [];
    $item   = getRandomNumber(10);
    $index  = 0;

    do {
        $item           = $item + $diff;
        $result[$index] = $item;
        $index++;
    } while ($index < $length);

    return $result;
}

function createQuestion(array $progression, int $index): string
{
    $placeholderLength   = strlen((string)$progression[$index]);
    $placeholder         = str_repeat('.', $placeholderLength);
    $progression[$index] = $placeholder;

    return implode($progression, ' ');
}
