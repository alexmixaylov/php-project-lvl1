<?php

namespace BrainGames\games\calc;

use function BrainGames\common\play;

function init()
{
    $gameDescription = 'What is the result of the expression?';
    $generateGameData           = function () {
        $operators   = ['+', '-', '*'];
        $operator    = array_rand(array_flip($operators), 1);
        $operand1    = rand(1, 10);
        $operand2    = rand(1, 10);
        $question    = "{$operand1} {$operator} {$operand2}";
        $rightAnswer = calcExpression($operator, $operand1, $operand2);

        return [$question, $rightAnswer];
    };
    play($gameDescription, $generateGameData);
}

function calcExpression($operator, $operand1, $operand2): int
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
            break;
        case '-':
            return $operand1 - $operand2;
            break;
        case '*':
            return $operand1 * $operand2;
            break;
            // здесь нужно по идее выбросить исключение но мы это еще не учили, поэтому возвращаю просто false
        default:
            return false;
    }
}
