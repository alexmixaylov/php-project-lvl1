<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);


}
