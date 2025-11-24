<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Validator\Exception\ValidationFailedException;

class ApiExceptionListener
{
    public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable()->getPrevious();

        if ($exception instanceof ValidationFailedException) {
            $errors = [];

            foreach ($exception->getViolations() as $violation) {
                $errors[$violation->getPropertyPath()][] = $violation->getMessage();
            }

            $event->setResponse(new JsonResponse([
                'status' => 'error',
                'errors' => $errors
            ], 400));
        }
    }
}

