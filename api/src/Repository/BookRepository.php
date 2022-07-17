<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 *
 * @method null|Book find($id, $lockMode = null, $lockVersion = null)
 * @method null|Book findOneBy(array $criteria, array $orderBy = null)
 * @method Book[] findAll()
 * @method Book[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function add(Book $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Book $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Book[]
     */
    public function searchByTitleOrAuthorOrIsbnCode(
        ?string $title = null,
        ?string $author = null,
        ?string $isbnCode = null,
    ): array {
        $qb = $this->createQueryBuilder('b');

        if (null !== $title) {
            $qb
                ->andWhere($qb->expr()->like('b.title', ':title'))
                ->setParameter('title', "%{$title}%")
            ;
        }

        if (null !== $author) {
            $qb
                ->join('b.authors', 'a')
                ->andWhere($qb->expr()->like('a.name', ':author'))
                ->setParameter('author', "%{$author}%")
            ;
        }

        if (null !== $isbnCode) {
            $qb
                ->andWhere($qb->expr()->like('b.isbnCode', ':isbnCode'))
                ->setParameter('isbnCode', "%{$isbnCode}%")
            ;
        }

        return $qb
            ->getQuery()
            ->getResult()
        ;
    }
}
