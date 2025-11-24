<?php

namespace App\DTO\Auth;

use Symfony\Component\Validator\Constraints as Assert;

readonly class UserRegisterDTO
{
    public function __construct(
        public string $name,
        #[Assert\NotBlank]
        #[Assert\Email]
        public string $email,
        #[Assert\NotBlank]
        #[Assert\Length(min: 8)]
        public string $password,
        #[Assert\NotBlank]
        #[Assert\EqualTo(
            propertyPath: 'password',
            message: 'Пароль не совпадает'
        )]
        public string $repeatPassword,
    ) {

    }
}
