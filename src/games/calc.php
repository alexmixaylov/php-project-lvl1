<?php

namespace BrainGames\games\calc;

use function BrainGames\common\greetAndGetUsername;
use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;

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
        $question = "{$operand1} {$operator} {$operand2}";
        $answer      = eval('return ' . $operand1 . $operator . $operand2 . ';');

        return makeResponse($question, $answer);
    };
    play($rules, $userName);
}
