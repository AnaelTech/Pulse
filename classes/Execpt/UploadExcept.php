<?php

require_once __DIR__ . '/../error.php';

class UploadException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->code = errors::UPLOAD_FAIL;
    }
}
