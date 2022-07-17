<?php

declare(strict_types=1);

namespace App\Dto\Request;

use Symfony\Component\HttpFoundation\Request;

class GetBookInput
{
    public ?string $title;

    public ?string $author;

    public ?string $isbnCode;

    public function __construct(
        Request $request
    ) {
        $queryParams = $request->query->all();

        $this->title = $queryParams['title'] ?? null;
        $this->author = $queryParams['author'] ?? null;
        $this->isbnCode = $queryParams['isbn-code'] ?? null;
    }
}
