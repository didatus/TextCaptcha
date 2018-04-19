<?php

use Didatus\TextCaptcha\Generator\Week;

/**
 * Class RandomStringTest
 */
class WeekGeneratorTest extends Test {
    public function testDummy()
    {
        $generator = new Week($this->translator);
        $captcha = $generator->getTextCaptcha();

        $this->assertEquals('thursday, friday, saturday', $captcha->getQuestion());
        $this->assertEquals('sunday', $captcha->getAnswer());
    }
}
