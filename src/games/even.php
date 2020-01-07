<?php

namespace BrainGames\games\even;

use function BrainGames\common\getRandomNumber;
use function BrainGames\common\makeResponse;
use function BrainGames\common\play;

function run($userName)
{
    $rules = function () {
        $question = getRandomNumber();
        $isEven = $question % 2 == 0;
        $answer = $isEven ? 'yes' : 'no';

        return makeResponse($question, $answer);
    };
    play($rules, $userName);
}
