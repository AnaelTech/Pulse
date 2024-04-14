<?php

require_once __DIR__ . '/../error.php';

class DuplicateEmailException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->code = errors::EMAIL_DUPLICATE;
    }
}
