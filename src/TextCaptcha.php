<?php

namespace Didatus\TextCaptcha;

use Ramsey\Uuid\Uuid;

/**
 * Class TextCaptcha
 * @package Didatus\TextCaptcha
 */
class TextCaptcha {

    /**
     * @var string
     */
    private $question;

    /**
     * @var string
     */
    private $answer;

    /**
     * @var string
     */
    private $uuid;

    /**
     * TextCaptcha constructor.
     *
     * @param string $question
     * @param string $answer
     */
    public function __construct(string $question, string $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->uuid = Uuid::uuid1()->toString();
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }


}
