<?php

namespace BrainGames\games\progression;

use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;
use function cli\line;

function run($userName)
{
    $rules = function () {
        $progrDifference    = getRandomNumber(5);
        $lenghtProgression  = 10;
        $hiddenElementIndex = getRandomNumber() - 1;

        $progression = createProgression($progrDifference, $lenghtProgression);
        $question    = createQuestion($progression, $hiddenElementIndex);
        $answer      = $progression[$hiddenElementIndex];

        return makeResponse($question, $answer);
    };

    play($rules, $userName);
}

function createProgression(int $diff, int $lenght): array
{
    $result = [];
    $item   = getRandomNumber(10);
    $index  = 0;

    do {
        $item           = $item + $diff;
        $result[$index] = $item;
        $index++;
    } while ($index < $lenght);

    return $result;
}

function createQuestion($progression, $index): string
{
    $placeholderLenght   = strlen((string)$progression[$index]);
    $placeholder         = str_repeat('.', $placeholderLenght);
    $progression[$index] = $placeholder;

    return implode($progression, ' ');
}
