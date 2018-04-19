<?php


use Didatus\TextCaptcha\TextCaptchaHandler;

abstract class test extends PHPUnit_Framework_TestCase {

    protected $translator;

    protected function setUp()
    {
        if (is_null($this->translator)) {
            $handler = new TextCaptchaHandler();
            $this->translator = $handler->getTranslator();
        }
        srand(42);
    }

}