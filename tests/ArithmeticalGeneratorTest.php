<?php

use Didatus\TextCaptcha\Generator\Arithmetical;

/**
 * Class RandomStringTest
 */
class ArithmeticalGeneratorTest extends Test {
    public function testDummy()
    {
        $generator = new Arithmetical($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('two minus six plus six', $captcha->getQuestion());
        $this->assertEquals('2', $captcha->getAnswer());
/*
        $generator = new Arithmetical($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('two minus six plus six', $captcha->getQuestion());
        $this->assertEquals('two', $captcha->getAnswer());
*/
    }
}
