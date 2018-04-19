<?php

namespace Didatus\TextCaptcha\Generator;

use Didatus\TextCaptcha\TextCaptcha;
use Symfony\Component\Translation\Translator;

class Arithmetical implements GeneratorInterface
{
    private $translator;

    private $numbers = [
        'zero',
        'one',
        'two',
        'three',
        'four',
        'five',
        'six',
        'seven',
        'eight',
        'nine',
    ];

    private $arithemticalFunctions = [
        '+' => 'plus',
        '-' => 'minus',
    ];

    private $captcha;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function getTextCaptcha(): TextCaptcha
    {
        if (is_null($this->captcha)) {
            $this->generateQuestion();
        }

        return $this->captcha;
    }

    private function generateQuestion()
    {
        $questionParts = [];
        $questionParts[] = rand(0, 9);
        $questionParts[] = array_rand($this->arithemticalFunctions);
        $questionParts[] = rand(0, 9);
        $questionParts[] = array_rand($this->arithemticalFunctions);
        $questionParts[] = rand(0, 9);

        $this->captcha = new TextCaptcha(
            $this->getQuestionString($questionParts),
            $this->calculateAnswer($questionParts)
        );
    }

    private function getQuestionString(array $questionParts):string
    {
        $question = '';
        $question .= $this->numbers[$questionParts[0]];
        $question .= ' ' . $this->arithemticalFunctions[$questionParts[1]] . ' ';
        $question .= $this->numbers[$questionParts[2]];
        $question .= ' ' . $this->arithemticalFunctions[$questionParts[3]] . ' ';
        $question .= $this->numbers[$questionParts[4]];

        return $question;
    }

    private function calculateAnswer(array $questionParts): string
    {
        $question = implode("", $questionParts);
        $answer = null;
        eval('$answer = ' . $question . ';');

        return (string)$answer;
    }
}
