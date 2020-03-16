<?php

namespace BrainGames\common;

use function cli\line;
use function cli\prompt;

const TIMES_TO_WIN = 3;

function greetUser($gameDescription)
{
    line('Welcome to Brain Games!');
    line($gameDescription);
}

function askUserName()
{
    $name = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $name);

    return $name;
}

function createQuestion($question)
{
    line('Question: %s', $question);

    return prompt('Your answer ');
}

function calcRightAnswer($question, $answer): array
{
    return [
        'question'    => $question,
        'rightAnswer' => (string)$answer,
        'userAnswer'  => ''
    ];
}

function play($gameDescription, $rules)
{
    greetUser($gameDescription);
    $userName = askUserName();
    $doStep   = function ($rules) {
        $userAnswer          = createQuestion($rules['question']);
        $rules['userAnswer'] = $userAnswer;

        return $rules;
    };

    $count    = 0;
    $nextStep = true;

    do {
        $getStepResult = $doStep($rules());
        $userAnswer    = $getStepResult['userAnswer'];
        $rightAnswer   = $getStepResult['rightAnswer'];

        if ($userAnswer !== $rightAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
            line("Let's try again, %s!", $userName);
            $nextStep = false;
        }
        $count++;

        if ($count == TIMES_TO_WIN && $nextStep) {
            line('Congratulations, %s!', $userName);
        }
    } while ($count < TIMES_TO_WIN && $nextStep);
}
