<?php

namespace BrainGames\games\calc;

use function BrainGames\games\common\greetAndGetUsername;
use function BrainGames\games\common\getRandomNumber;
use function BrainGames\games\common\makeQuestion;
use function BrainGames\games\common\play;

function run()
{
    $userName = greetAndGetUsername();

    $rules    = function () {
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
            'answer'   => $answer
        ];
    };

    $round    = function ($rules) {
        $question    = $rules['question'];
        $userAnswer  = makeQuestion($question);
        $rightAnswer = $rules['answer'];

        return [
            'question' => $question,
            'userAnswer' => $userAnswer,
            'rightAnswer' => $rightAnswer
        ];
    };

    play($rules, $round, $userName);
}
