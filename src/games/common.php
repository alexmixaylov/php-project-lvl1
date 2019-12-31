<?php

namespace BrainGames\games\common;

use function cli\line;
use function cli\prompt;

const TIMES_TO_WIN = 3;

function greetAndGetUsername()
{
    line('Welcome to Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $name = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $name);

    return $name;
}

function getTimesToWin()
{
    return TIMES_TO_WIN;
}

function getRandomNumber()
{
    return rand(1, 10);
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

function play($rules, $round, $userName)
{
    $count = 0;
    $nextStep = true;
    do {
        $roundResult = $round($rules());
        $userAnswer  = $roundResult['userAnswer'];
        $rightAnswer = $roundResult['rightAnswer'];

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
