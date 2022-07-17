<?php

declare(strict_types=1);

namespace App\Dto\Request;

use App\Entity\Book;

class GetBookByIdInput
{
    public Book $book;

    public function __construct(
        Book $book
    ) {
        $this->book = $book;
    }
}
