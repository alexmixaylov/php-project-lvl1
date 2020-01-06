<?php

namespace BrainGames\greeting;

use function cli\line;
use function cli\prompt;
use function BrainGames\games as gameFolder;

function init($game, $gameDescription)
{
    line('Welcome to Brain Games!');
    line($gameDescription);

    $name = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $name);
    // здесь не знаю как вызвать нужную функцию
    // вместо even здесь должна быть переменная $game
    // или это уже лишнее?
    gameFolder\even\run($name);
}
