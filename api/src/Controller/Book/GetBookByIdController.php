<?php

declare(strict_types=1);

namespace App\Controller\Book;

use App\Application\RestResource\Book\GetBookByIdManager;
use App\Application\RestResource\Book\GetBookManager;
use App\Controller\AbstractCustomController;
use App\Dto\Request\GetBookByIdInput;
use App\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GetBookByIdController extends AbstractCustomController
{
    #[Route('/api/v1/book/{id}', name: 'app_get_book_by_id', methods: ['GET'])]
    #[ParamConverter('book', class: Book::class)]
    public function index(
        ValidatorInterface $validator,
        RequestStack $requestStack,
        Book $book,
        GetBookByIdManager $manager
    ): JsonResponse {
        $inputDto = new GetBookByIdInput($book);

        $violations = $validator->validate($inputDto);

        if (count($violations) > 0) {
            throw new BadRequestHttpException($this->getMessagesByViolations($violations));
        }

        return $this->json(
            $manager->run($inputDto)
        );
    }
}
