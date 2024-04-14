<?php

require_once __DIR__ . '/../error.php';

class EmptyExcept extends InvalidArgumentException
{
    public function __construct()
    {
        $this->code = errors::EMPTY;
    }
}
