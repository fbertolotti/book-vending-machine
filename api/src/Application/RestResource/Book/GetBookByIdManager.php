<?php

declare(strict_types=1);

namespace App\Application\RestResource\Book;

use App\Dto\Request\GetBookByIdInput;
use App\Entity\Book;
use App\Repository\BookRepository;

class GetBookByIdManager
{
    public function __construct(
        private BookRepository $bookRepository
    ) {
    }

    /**
     * @return Book[]
     */
    public function run(
        GetBookByIdInput $dto
    ): ?Book {
        return $this->bookRepository->find(
            $dto->book->getId()
        );
    }
}
