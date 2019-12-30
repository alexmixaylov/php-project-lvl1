<?php

namespace BrainGames\games\common;

use function cli\line;
use function cli\prompt;

const TIMES_TO_WIN = 3;


/**
 * @return string
 */
function greetAndGetName()
{
    line('Welcome to Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $name = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $name);

    return $name;
}

function timesToWin()
{
    return TIMES_TO_WIN;
}
