<?php

namespace App\Service;

use App\Entity\Calculation;
use Doctrine\ORM\EntityManagerInterface;

class HistoryService
{

    public function __construct(protected EntityManagerInterface $entityManager)
    {
    }

    public function getHistory(): array
    {
        return $this->entityManager->getRepository(Calculation::class)->findAll();
    }
}