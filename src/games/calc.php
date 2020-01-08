<?php

namespace BrainGames\games\calc;

use function BrainGames\common\getRandomNumber;
use function BrainGames\common\createResponse;
use function BrainGames\common\play;

function run($userName)
{
    $rules = function () {
        $operator    = getOperator();
        $operand1    = getRandomNumber();
        $operand2    = getRandomNumber();
        $question    = "{$operand1} {$operator} {$operand2}";
        $rightAnswer      = eval('return ' . $operand1 . $operator . $operand2 . ';');

        return createResponse($question, $rightAnswer);
    };
    play($rules, $userName);
}

function getOperator()
{
    $operators = ['+', '-', '*'];
    $maxIndex = count($operators) - 1;
    return $operators[rand(0, $maxIndex)];
}
