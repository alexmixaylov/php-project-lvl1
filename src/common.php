<?php

namespace BrainGames\common;

use function cli\line;
use function cli\prompt;

const TIMES_TO_WIN = 3;

function play(string $gameDescription, callable $generateGameData)
{
    // initial parameters
    line("Welcome to Brain Games!\n" . $gameDescription);
    $userName = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $userName);

    // game process
    for ($i = 0; $i <= TIMES_TO_WIN; $i++) {
        if ($i == TIMES_TO_WIN) {
            line('Congratulations, %s!', $userName);
            break;
        }

        [$question, $rightAnswer] = $generateGameData();
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer ');

        if ($rightAnswer == $userAnswer) {
            continue;
        }

        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
        line("Let's try again, %s!", $userName);
        break;
    }
}
