<?php

namespace Didatus\TextCaptcha\Generator;

use Didatus\TextCaptcha\TextCaptcha;
use Symfony\Component\Translation\Translator;

abstract class AbstractSequence implements GeneratorInterface
{
    protected $sequencePool = [];

    protected $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function getTextCaptcha(): TextCaptcha
    {
        $sequence = $this->translateSequence($this->generateSequence());

        $answer = array_pop($sequence);

        return new TextCaptcha(implode(', ', $sequence), $answer);
    }

    private function generateSequence()
    {
        $sequencePool = $this->sequencePool;
        if (rand(0, 1) == 1) {
            $sequencePool = array_reverse($sequencePool);
        }

        return array_slice($sequencePool, rand(0, count($sequencePool) - 4), 4);
    }

    private function translateSequence($sequence)
    {
        $translateSequence = [];
        foreach ($sequence as $element) {
            $translateSequence[] = $this->translator->trans($element);
        }

        return $translateSequence;
    }
}