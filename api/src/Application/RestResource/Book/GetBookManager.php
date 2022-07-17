<?php

declare(strict_types=1);

namespace App\Application\RestResource\Book;

use App\Dto\Request\GetBookInput;
use App\Repository\BookRepository;

class GetBookManager
{
    public function __construct(
        private BookRepository $bookRepository
    ) {
    }

    /**
     * @return Book[]
     */
    public function run(
        GetBookInput $dto
    ): array {
        return $this->bookRepository->searchByTitleOrAuthorOrIsbnCode(
            $dto->title,
            $dto->author,
            $dto->isbnCode,
        );
    }
}
