<?php

namespace BrainGames\games\even;

use function BrainGames\games\common\greetAndGetUsername;
use function BrainGames\games\common\getRandomNumber;
use function BrainGames\games\common\makeQuestion;
use function BrainGames\games\common\play;


function run()
{

    $userName   = greetAndGetUsername();

    $rules = function () {
        $question = getRandomNumber();
        $isEven = $question % 2 == 0;
        $answer = $isEven ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' =>  $answer
        ];

    };

    $round = function ($rules) {
        $question    = $rules['question'];
        $userAnswer  = makeQuestion($question);
        $rightAnswer = $rules['answer'];

        return [
            'question' => $question,
            'userAnswer' => $userAnswer,
            'rightAnswer' => $rightAnswer
        ];

    };

    play($rules, $round, $userName);

}




