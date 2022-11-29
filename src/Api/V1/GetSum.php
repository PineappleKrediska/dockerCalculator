<?php

namespace App\Api\V1;

use App\Service\CalculateService;
use stdClass;

class GetSum extends AbstractMethod
{


    protected CalculateService $calculateService;

    /**
     * @param CalculateService $calculateService
     */
    public function __construct(CalculateService $calculateService)
    {
        $this->calculateService = $calculateService;
    }

    /**
     * @inheritDoc
     */
    protected function process(array $params): array
    {
        return $this->calculateService->sum($params['firstNumber'], $params['secondNumber'])->jsonSerialize();
    }

    /**
     * @inheritDoc
     */
    public function getSpec(): ?stdClass
    {
        return null;
    }
}