<?php

namespace BrainGames\games\progression;

use function BrainGames\games\common\greetAndGetUsername;
use function BrainGames\games\common\getRandomNumber;
use function BrainGames\games\common\makeResponse;
use function BrainGames\games\common\play;

function run()
{
    $userName = greetAndGetUsername('What number is missing in the progression?');

    $rules = function () {
        $progrDifference    = getRandomNumber(20);
        $lenghtProgression  = 10;
        $hiddenElementIndex = getRandomNumber() - 1;
        $startProgression   = getRandomNumber();

        $progression = createProgression($startProgression, $progrDifference, $lenghtProgression);
        $question = createQuestion($progression, $hiddenElementIndex);
        $answer = $progression[$hiddenElementIndex];

        return makeResponse($question, $answer);
    };

    play($rules, $userName);
}

function createProgression($start, $diff, $lenght): array
{
    $result = [$start];
    for ($i = 1; $i < $lenght; $i++) {
        $result[$i] = $result[$i - 1] + $diff;
    }

    return $result;
}

function createQuestion($progression, $index): string
{
    $placeholderLenght   = strlen((string)$progression[$index]);
    $placeholder         = str_repeat('.', $placeholderLenght);
    $progression[$index] = $placeholder;

    return implode($progression, ' ');
}
