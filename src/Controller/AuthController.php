<?php

namespace App\Controller;

use App\DTO\Auth\UserRegisterDTO;
use App\Service\Auth\UserAuthService;
use Nelmio\ApiDocBundle\Attribute\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/auth/')]
#[OA\Tag('Authentication')]
final class AuthController extends AbstractController
{
    public function __construct(
        private readonly UserAuthService $userAuthService
    ) {

    }

    #[Route('register', name: 'register', methods: ['POST'])]
    #[OA\RequestBody(content: new Model(type: UserRegisterDTO::class))]
    #[OA\Response(
        response: 200,
        description: 'Successful response',
    )]
    public function register(#[MapRequestPayload] UserRegisterDTO $userRegisterDTO): JsonResponse
    {
        $this->userAuthService->register($userRegisterDTO);
        return $this->json([]);
    }
}
