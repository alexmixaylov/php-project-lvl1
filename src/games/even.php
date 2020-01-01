<?php

namespace BrainGames\games\even;

use function BrainGames\common\greetAndGetUsername;
use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;


function run()
{

    $userName   = greetAndGetUsername('Answer "yes" if the number is even, otherwise answer "no".');

    $rules = function () {
        $question = getRandomNumber();
        $isEven = $question % 2 == 0;
        $answer = $isEven ? 'yes' : 'no';

        return makeResponse($question, $answer);

    };



    play($rules, $userName);

}




