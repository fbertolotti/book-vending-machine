<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

abstract class AbstractCustomController extends AbstractController
{
    protected function getMessagesByViolations(ConstraintViolationListInterface $violations): string
    {
        return join(', ', array_map(function (ConstraintViolationInterface $violation) {
            return $violation->getPropertyPath() . ': ' . strtolower((string) $violation->getMessage());
        }, iterator_to_array($violations)));
    }
}
