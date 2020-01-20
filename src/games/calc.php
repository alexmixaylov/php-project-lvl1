<?php

namespace BrainGames\games\calc;

use function BrainGames\common\createResponse;
use function BrainGames\common\play;

function run($userName)
{
    $initRules = function () {
        $operators   = ['+', '-', '*'];
        $operator    = $operators[rand(0, count($operators) - 1)];
        $operand1    = rand(1, 10);
        $operand2    = rand(1, 10);
        $question    = "{$operand1} {$operator} {$operand2}";
        $rightAnswer = calcExpression($operator, $operand1, $operand2);

        return createResponse($question, $rightAnswer);
    };
    play($initRules, $userName);
}

/**
 * Calculate Expression
 *
 * @param string $operator
 * @param int $operand1
 * @param int $operand2
 *
 * @return int
 */
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
