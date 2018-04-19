<?php

use Didatus\TextCaptcha\TextCaptcha;

/**
 * @coversDefaultClass TextCaptcha
 * @covers \Didatus\TextCaptcha\TextCaptcha
 */
class TextCaptchaTest extends Test {

    public function testTest()
    {
        $captcha = new TextCaptcha('Foo', 'Bar');
        $uuid = $captcha->getUuid();

        $this->assertRegExp('/[\w]{8}(-[\w]{4}){3}-[\w]{12}/', $uuid);
    }
}
