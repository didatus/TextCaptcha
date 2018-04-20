<?php

namespace Didatus\TextCaptcha;

use Didatus\TextCaptcha\Generator\Arithmetical;
use Didatus\TextCaptcha\Generator\Month;
use Didatus\TextCaptcha\Generator\Week;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Translation\Translator;

/**
 * Class TextCaptchaHandler
 * @package Didatus\TextCaptcha
 */
class TextCaptchaHandler
{
    private $translator;

    private $generators = [];

    public function __construct($locale = 'de_DE')
    {
        $this->translator = $this->initiateTranslator($locale);

        $this->registerCaptchaGenerator(Week::class);
        $this->registerCaptchaGenerator(Month::class);
        $this->registerCaptchaGenerator(Arithmetical::class);
    }

    /**
     * @return Translator
     */
    public function getTranslator(): Translator
    {
        return $this->translator;
    }

    public function generateTextCaptcha()
    {
        $generator = $this->generators[rand(0, count($this->generators))];

        return $generator->getTextCaptcha();
    }

    private function registerCaptchaGenerator(string $generatorName)
    {
        $this->generators[] = new $generatorName($this->translator);
    }

    /**
     * @return Translator
     */
    private function initiateTranslator($locale):Translator
    {
        $translator = new Translator($locale);
        $translator->addLoader('phpfile', new PhpFileLoader());
        $translator->addResource('phpfile', __DIR__ . '/../translations/mathematical.de.php', 'de_DE');
        $translator->addResource('phpfile', __DIR__ . '/../translations/mathematical.en.php', 'en_US');
        $translator->addResource('phpfile', __DIR__ . '/../translations/calender.de.php', 'de_DE');
        $translator->addResource('phpfile', __DIR__ . '/../translations/calender.en.php', 'en_US');

        return $translator;
    }
}
