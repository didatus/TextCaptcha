<?php

use Didatus\TextCaptcha\Generator\Arithmetical;

/**
 * Class RandomStringTest
 */
class ArithmeticalGeneratorTest extends Test {
    public function testEnglish()
    {
        $this->translator->setLocale('en_us');
        $generator = new Arithmetical($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('two minus six plus six', $captcha->getQuestion());
        $this->assertEquals('2', $captcha->getAnswer());
        $this->translator->setLocale('de_DE');
    }

    public function testGerman()
    {
        $generator = new Arithmetical($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('zwei minus sechs plus sechs', $captcha->getQuestion());
        $this->assertEquals('2', $captcha->getAnswer());
    }
}
