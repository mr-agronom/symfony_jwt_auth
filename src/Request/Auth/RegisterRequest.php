<?php

namespace App\Request\Auth;

readonly class RegisterRequest
{
    public function __construct(
        public string $username,
        public string $password,
        public string $repeatPassword,
    ) {

    }
}
