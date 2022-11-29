<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name = "calculation")
 */
class Calculation
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private int $id;

    /**
     * @var int
     * @ORM\Column(name="first_number", type="integer", nullable = false)
     */
    private int $firstNumber;

    /**
     * @var int
     * @ORM\Column(name="second_number", type="integer", nullable = false)
     */
    private int $secondNumber;

    /**
     * @var string
     * @ORM\Column(name="operation_type", type="string", length=1, nullable=false)
     */
    private string $operationType;

    /**
     * @var int
     * @ORM\Column(name="result", type="integer", nullable = false)
     */
    private int $result;

    /**
     * @param int $firstNumber
     * @param int $secondNumber
     * @param string $operationType
     * @param int $result
     */
    public function __construct(int $firstNumber, string $operationType, int $secondNumber,  int $result)
    {
        $this->firstNumber = $firstNumber;
        $this->secondNumber = $secondNumber;
        $this->operationType = $operationType;
        $this->result = $result;
    }

    /**
     * @return int
     */
    public function getFirstNumber(): int
    {
        return $this->firstNumber;
    }

    /**
     * @return int
     */
    public function getSecondNumber(): int
    {
        return $this->secondNumber;
    }

    /**
     * @return string
     */
    public function getOperationType(): string
    {
        return $this->operationType;
    }

    /**
     * @return int
     */
    public function getResult(): int
    {
        return $this->result;
    }


    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'firstNumber' => $this->getFirstNumber(),
            'operationType' => $this->getOperationType(),
            'secondNumber' => $this->getSecondNumber(),
            'result' => $this->getResult(),
        ];
    }

}