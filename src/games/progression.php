<?php

namespace BrainGames\games\progression;

use function BrainGames\greeting\greetAndReturnName;
use function BrainGames\common\calcRightAnswer;
use function BrainGames\common\play;

function init()
{
    $userName = greetAndReturnName('What number is missing in the progression?');
    run($userName);

    return false;
}

function run($userName)
{
    $initRules = function () {
        $beginProgression   = rand(1, 10);
        $diffProgression    = rand(1, 5);
        $lengthProgression  = 10;
        $hiddenElementIndex = rand(1, $lengthProgression) - 1;

        $progression = createProgression($beginProgression, $diffProgression, $lengthProgression);
        $question    = createQuestion($progression, $hiddenElementIndex);
        $rightAnswer = $progression[$hiddenElementIndex];

        return calcRightAnswer($question, $rightAnswer);
    };

    play($initRules, $userName);
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
    $placeholderLength   = strlen((string)$progression[$index]);
    $placeholder         = str_repeat('.', $placeholderLength);
    $progression[$index] = $placeholder;

    return implode($progression, ' ');
}
