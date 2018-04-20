<?php

use Didatus\TextCaptcha\Generator\Month;

/**
 * Class RandomStringTest
 */
class MonthGeneratorTest extends Test {
    public function testEnglish()
    {
        $this->translator->setLocale('en_US');
        $generator = new Month($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('June, July, August', $captcha->getQuestion());
        $this->assertEquals('September', $captcha->getAnswer());
        $this->translator->setLocale('de_DE');
    }

    public function testGerman()
    {
        $generator = new Month($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('Juni, Juli, August', $captcha->getQuestion());
        $this->assertEquals('September', $captcha->getAnswer());
    }
}
