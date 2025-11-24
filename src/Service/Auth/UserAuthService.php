<?php

namespace App\Service\Auth;

use App\DTO\Auth\UserRegisterDTO;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserAuthService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager,
    ) {

    }

    public function register(UserRegisterDTO $userRegisterDTO) : void
    {
        if ($this->userRepository->findOneBy(['email' => $userRegisterDTO->email])) {
            throw new \RuntimeException('Пользователь с таким email уже существует');
        }

        $user = new User();
        $user->setEmail($userRegisterDTO->email);
        $user->setPassword(password_hash($userRegisterDTO->password, PASSWORD_DEFAULT));

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
