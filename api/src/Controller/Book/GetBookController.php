<?php

declare(strict_types=1);

namespace App\Controller\Book;

use App\Application\RestResource\Book\GetBookManager;
use App\Controller\AbstractCustomController;
use App\Dto\Request\GetBookInput;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GetBookController extends AbstractCustomController
{
    #[Route('/api/v1/book', name: 'app_get_book', methods: ['GET'])]
    public function index(
        ValidatorInterface $validator,
        RequestStack $requestStack,
        GetBookManager $manager
    ): JsonResponse {
        $inputDto = new GetBookInput($requestStack->getCurrentRequest());

        $violations = $validator->validate($inputDto);

        if (count($violations) > 0) {
            throw new BadRequestHttpException($this->getMessagesByViolations($violations));
        }

        return $this->json(
            $manager->run($inputDto)
        );
    }
}
