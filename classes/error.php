<?php

class errors
{
    public const EMAIL_INVALID          = 1;
    public const EMAIL_DUPLICATE        = 2;
    public const EMPTY                  = 3;
    public const DB_CONNECTION          = 4;

    public const INVALID_ARGUMENT = 5;

    public const UPLOAD_FAIL = 6;

    public static function getErrorMessage(int $errorCode): string
    {
        return match ($errorCode) {
            self::EMPTY                 => "Merci de remplir tous les champs obligatoire",
            self::EMAIL_INVALID         => "Le format de l'email est incorrect",
            self::EMAIL_DUPLICATE       => "L'email existe déjà dans la base de données",
            self::DB_CONNECTION         => "Erreur lors de la connexion à la base de donnée",
            self::INVALID_ARGUMENT      => "Erreur dans l'identifiant ou le mot de passe",
            self::UPLOAD_FAIL           => "Erreur lors du téléchargement de l'image",
            default                     => "Une erreur est survenue"
        };
    }
}
