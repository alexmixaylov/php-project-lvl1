<?php

namespace BrainGames\games\calc;

use function BrainGames\common\calcRightAnswer;
use function BrainGames\common\play;

function init()
{
    $gameDescription = 'What is the result of the expression?';
    $rules = function () {
        $operators   = ['+', '-', '*'];
        $operator    = $operators[rand(0, count($operators) - 1)];
        $operand1    = rand(1, 10);
        $operand2    = rand(1, 10);
        $question    = "{$operand1} {$operator} {$operand2}";
        $rightAnswer = calcExpression($operator, $operand1, $operand2);

        return calcRightAnswer($question, $rightAnswer);
    };
    play($gameDescription, $rules);
}

function calcExpression($operator, $operand1, $operand2): int
{
    $result = 0;
    switch ($operator) {
        case '+':
            $result = $operand1 + $operand2;
            break;
        case '-':
            $result = $operand1 - $operand2;
            break;
        case '*':
            $result = $operand1 * $operand2;
            break;
    }

    return $result;
}
