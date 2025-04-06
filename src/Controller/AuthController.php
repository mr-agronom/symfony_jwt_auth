<?php

namespace App\Controller;

use App\Request\Auth\RegisterRequest;
use App\Response\Auth\RegisterResponse;
use Nelmio\ApiDocBundle\Attribute\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/auth/')]
#[OA\Tag('Authentication')]
final class AuthController extends AbstractController
{
    #[Route('register', name: 'register', methods: ['POST'])]
    #[OA\RequestBody(content: new Model(type: RegisterRequest::class))]
    #[OA\Response(
        response: 200,
        description: 'Successful response',
        content: new Model(type: RegisterResponse::class)
    )]
    public function register(): RegisterResponse
    {
        return new RegisterResponse('');
    }
}
