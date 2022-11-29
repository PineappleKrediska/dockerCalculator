<?php

namespace App\Api\V1;

use App\Service\CalculateService;
use stdClass;

class GetMul extends AbstractMethod
{
    protected CalculateService $calculateService;
    /**
     * @inheritDoc
     */
    protected function process(array $params): array
    {
        return $this->calculateService->mul($params['firstNumber'], $params['secondNumber'])->jsonSerialize();
    }

    /**
     * @inheritDoc
     */
    public function getSpec(): ?stdClass
    {
        return null;
    }
}