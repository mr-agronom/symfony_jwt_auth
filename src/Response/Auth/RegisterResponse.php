<?php

namespace App\Response\Auth;

readonly class RegisterResponse
{
    public function __construct(public string $token)
    {

    }
}
