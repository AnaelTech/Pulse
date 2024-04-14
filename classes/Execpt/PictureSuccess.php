<?php

require_once __DIR__ . '/../success.php';

class PictureSuccess extends InvalidArgumentException
{
    public function __construct()
    {
        $this->code = Success::PICTURE_REGIST;
    }
}
