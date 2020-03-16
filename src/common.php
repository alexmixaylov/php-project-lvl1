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

function play($gameDescription, $gameParams)
{
    greetUser($gameDescription);
    $userName = askUserName();

    for ($i = 0; $i <= TIMES_TO_WIN; $i++) {
        if ($i == TIMES_TO_WIN) {
            line('Congratulations, %s!', $userName);
            break;
        }

        [$question, $rightAnswer] = $gameParams();
        $userAnswer = createQuestion($question);

        if ($rightAnswer == $userAnswer) {
            continue;
        } else {
            failStep($userName, $userAnswer, $rightAnswer);
            break;
        }
    }
}

function passStep()
{

}

function failStep($userName, $userAnswer, $rightAnswer)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
    line("Let's try again, %s!", $userName);
}
