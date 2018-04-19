<?php

namespace Didatus\TextCaptcha\Generator;

use Didatus\TextCaptcha\TextCaptcha;

interface GeneratorInterface
{
    public function getTextCaptcha(): TextCaptcha;
}
