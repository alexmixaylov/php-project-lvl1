<?php

namespace BrainGames\games\even;

use function cli\line;
use function cli\prompt;
use function BrainGames\games\common\timesToWin;
use function BrainGames\games\common\greetAndGetName;

$userName1    = greetAndGetName();

function run()
{
    $count       = 0;
    $userName    = greetAndGetName();
    $askQuestion = function ($number, $userName) use ($count) {
        line('Question: ' . $number);
        $answer = prompt('Your answer ');

        $rightAnswer = checkAnswer(isEven($number));

        if ($answer == $rightAnswer) {
            line('Correct!');

            return true;

        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $rightAnswer);
            line("Let's try again, %s!", $userName);

            return false;
        }

    };

    do {
        $pass = $askQuestion(getRandomNumber(), $userName);
        $count++;
        if ($count == timesToWin()) {
            line('Congratulations, %s!', $userName);
        }
    } while ($count < timesToWin() && $pass);


}

function checkAnswer($isEven)
{
    return $isEven ? 'yes' : 'no';
}

function isEven($number)
{
    return $number % 2 == 0;
}

function getRandomNumber()
{
    return rand(1, 100);
}


