<?php

namespace BrainGames\engine;

use function cli\line;
use function cli\prompt;

const TIMES_TO_WIN = 3;

function play(string $gameDescription, callable $generateGameData)
{
    // initial parameters
    line("Welcome to Brain Games!");

    line($gameDescription);

    $userName = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $userName);

    // game process
    for ($i = 0; $i < TIMES_TO_WIN; $i++) {
        [$question, $rightAnswer] = $generateGameData();
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer ');

        if ($rightAnswer == $userAnswer) {
            line('Correct!');
            continue;
        }

        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
        line("Let's try again, %s!", $userName);
        return;
    }

    line('Congratulations, %s!', $userName);
}
