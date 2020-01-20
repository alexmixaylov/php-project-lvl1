<?php

namespace BrainGames\greeting;

use function cli\line;
use function cli\prompt;

function greetAndReturnName($gameDescription)
{
    line('Welcome to Brain Games!');
    line($gameDescription);

    $name = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $name);

    return $name;
}
