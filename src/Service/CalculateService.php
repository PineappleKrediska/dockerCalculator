<?php

namespace App\Service;

use App\Entity\Calculation;
use Doctrine\ORM\EntityManagerInterface;
use Throwable;

class CalculateService
{


    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function sum(int $firstNumber, int $secondNumber): Calculation
    {
        $operationType = '+';
        return $this->calculate($firstNumber, $operationType, $secondNumber);
    }

    public function sub(int $firstNumber, int $secondNumber): Calculation
    {
        $operationType = '-';
        return $this->calculate($firstNumber, $operationType, $secondNumber);
    }

    public function mul(int $firstNumber, int $secondNumber): Calculation
    {
        $operationType = '*';
        return $this->calculate($firstNumber, $operationType, $secondNumber);
    }

    public function div(int $firstNumber, int $secondNumber): Calculation
    {
        $operationType = '/';
        return $this->calculate($firstNumber, $operationType, $secondNumber);
    }

    private function calculate(int $firstNumber, string $operationType, int $secondNumber): Calculation
    {
        $answer = eval(" $firstNumber $operationType $secondNumber;");
        $result = new Calculation($firstNumber, $operationType, $secondNumber, $answer);
        $this->toDataBase($result);
        return $result;
    }

    private function toDataBase(Calculation $calculation):void
    {
            $this->entityManager->persist($calculation);
            $this->entityManager->flush();
    }
}