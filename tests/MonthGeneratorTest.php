<?php

use Didatus\TextCaptcha\Generator\Month;

/**
 * Class RandomStringTest
 */
class MonthGeneratorTest extends Test {
    public function testDummy()
    {
        $generator = new Month($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('june, july, august', $captcha->getQuestion());
        $this->assertEquals('september', $captcha->getAnswer());
    }
}
