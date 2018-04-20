<?php

use Didatus\TextCaptcha\Generator\Week;

/**
 * Class RandomStringTest
 */
class WeekGeneratorTest extends Test {
    public function testEnglish()
    {
        $this->translator->setLocale('en_US');
        $generator = new Week($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('Thursday, Friday, Saturday', $captcha->getQuestion());
        $this->assertEquals('Sunday', $captcha->getAnswer());
        $this->translator->setLocale('de_DE');
    }

    public function testGerman()
    {
        $generator = new Week($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('Donnerstag, Freitag, Samstag', $captcha->getQuestion());
        $this->assertEquals('Sonntag', $captcha->getAnswer());
    }
}
