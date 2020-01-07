<?php

namespace BrainGames\greeting;

use function cli\line;
use function cli\prompt;

function init($game, $gameDescription)
{
    line('Welcome to Brain Games!');
    line($gameDescription);

    $name = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $name);

    $gameFunction = "\\BrainGames\games\\{$game}\\run";
    $gameFunction($name);
}
