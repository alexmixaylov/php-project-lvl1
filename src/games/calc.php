<?php

namespace BrainGames\games\calc;

use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;

function run($userName)
{
    $rules = function () {
        $operator    = getOperator();
        $operand1    = getRandomNumber();
        $operand2    = getRandomNumber();
        $question    = "{$operand1} {$operator} {$operand2}";
        $answer      = eval('return ' . $operand1 . $operator . $operand2 . ';');

        return makeResponse($question, $answer);
    };
    play($rules, $userName);
}

function getOperator()
{
    $operators = ['+', '-', '*'];
    $maxIndex = count($operators) - 1;
    return $operators[rand(0, $maxIndex)];
}
