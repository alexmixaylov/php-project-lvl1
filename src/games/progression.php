<?php

namespace BrainGames\games\progression;

use function BrainGames\games\common\greetAndGetUsername;
use function BrainGames\games\common\getRandomNumber;
use function BrainGames\games\common\makeResponse;
use function BrainGames\games\common\play;

function run()
{
    $userName = greetAndGetUsername('What number is missing in the progression?');

    $rules = function () {
        $progrDifference = getRandomNumber(5);
        $lenghtProgression = 10;
        $hiddenElementIndex = getRandomNumber() - 1;
        $startProgression = getRandomNumber();



        return makeResponse($question, $answer);
    };

    play($rules, $userName);
}

function createProgression() : array
{
 return [];
}

