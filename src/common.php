<?php

namespace BrainGames\common;

use function cli\line;
use function cli\prompt;

const TIMES_TO_WIN = 3;

function greetAndGetUsername($conditions)
{
    line('Welcome to Brain Games!');
    line($conditions);

    $name = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $name);

    return $name;
}

function getRandomNumber($max = 10)
{
    return rand(1, $max);
}

function makeQuestion($question)
{
    line('Question: %s', $question);

    return prompt('Your answer ');
}

function gameOver($userName, $userAnswer, $rightAnswer)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
    line("Let's try again, %s!", $userName);
}

function play($rules, $userName)
{
    $doStep = function ($rules) {
        $userAnswer = makeQuestion($rules['question']);
        $rules['userAnswer'] = $userAnswer;
        return $rules;
    };

    $count    = 0;
    $nextStep = true;

    do {
        $getStepResult = $doStep($rules());
        $userAnswer  = $getStepResult['userAnswer'];
        $rightAnswer = $getStepResult['rightAnswer'];

        if ($userAnswer !== $rightAnswer) {
            gameOver($userName, $userAnswer, $rightAnswer);
            $nextStep = false;
        }
        $count++;

        if ($count == TIMES_TO_WIN && $nextStep) {
            line('Congratulations, %s!', $userName);
        }

    } while ($count < TIMES_TO_WIN && $nextStep);


}

function makeResponse($question, $answer): array
{
    return [
        'question'    => $question,
        'rightAnswer' => (string)$answer
    ];
}
