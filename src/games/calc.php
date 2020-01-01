<?php

namespace BrainGames\games\calc;

use function BrainGames\games\common\greetAndGetUsername;
use function BrainGames\games\common\getRandomNumber;
use function BrainGames\games\common\play;
use function cli\line;

function run()
{
    $userName = greetAndGetUsername('What is the result of the expression?');

    $rules = function () {
        $getOperator = function () {
            $index = rand(0, 2);

            return ['+', '-', '*'][$index];
        };
        $operator    = $getOperator();
        $operand1    = getRandomNumber();
        $operand2    = getRandomNumber();
        $answer      = eval('return ' . $operand1 . $operator . $operand2 . ';');

        return [
            'question' => "{$operand1} {$operator} {$operand2}",
            'answer'   => (string)$answer
        ];
    };

    play($rules, $userName);
}
