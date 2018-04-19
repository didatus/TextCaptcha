<?php

use Didatus\TextCaptcha\TextCaptcha;
use Didatus\TextCaptcha\TextCaptchaHandler;
use Symfony\Component\Translation\Translator;

class TextCaptchaHandlerTest extends Test
{
    public function testHandlerTranslator()
    {
        $handler = new TextCaptchaHandler();
        $translator = $handler->getTranslator();

        $this->assertInstanceOf(Translator::class, $translator);
    }

    public function testCaptchaGenerator()
    {
        $handler = new TextCaptchaHandler();
        $captcha = $handler->generateTextCaptcha();

        $this->assertInstanceOf(TextCaptcha::class, $captcha);
    }
}
