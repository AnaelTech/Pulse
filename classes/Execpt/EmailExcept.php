<?php

require_once __DIR__ . '/../error.php';

class InvalidEmailException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->code = errors::EMAIL_INVALID;
    }
}
