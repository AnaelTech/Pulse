<?php

require_once __DIR__ . '/Execpt/EmailExcept.php';


class Email
{
    private string $email;


    /**
     * @param string $email
     * @throws InvalidArgumentException if email is invalid
     */
    public function __construct(string $email)
    {
        $this->email = $email;

        if (!$this->isValid()) {
            throw new InvalidEmailException();
        }
    }

    private function isValid(): bool
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function getDomain(): string
    {
        return ltrim(strstr($this->email, '@'), '@');
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
