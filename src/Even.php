<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

const TIMES_TO_WIN = 3;

function run()
{
    line("%s", TIMES_TO_WIN);
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
        if ($count == TIMES_TO_WIN){
            line('Congratulations, %s!', $userName);
        }
    } while ($count < TIMES_TO_WIN && $pass);


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

function greetAndGetName()
{
    line('Welcome to Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $name = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $name);

    return $name;
}
