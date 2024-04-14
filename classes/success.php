<?php

class success
{
    public const PICTURE_REGIST          = 1;

    public static function getSuccessMessage(int $successCode): string
    {
        return match ($successCode) {
            self::PICTURE_REGIST              => "Image enregistré avec succés",
            default                     => "Une erreur est survenue"
        };
    }
}
