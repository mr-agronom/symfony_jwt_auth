<?php

namespace App\Controller;

use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/auth/')]
#[OA\Tag('Authentication')]
final class AuthController extends AbstractController
{
    #[Route('register', name: 'register', methods: ['POST'])]
    public function register(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }
}
