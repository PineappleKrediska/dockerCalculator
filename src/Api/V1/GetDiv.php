<?php

namespace App\Api\V1;

use App\Service\CalculateService;
use stdClass;

class GetDiv extends AbstractMethod
{
    protected CalculateService $calculateService;
    /**
     * @inheritDoc
     */
    protected function process(array $params): array
    {
        return $this->calculateService->div($params['firstNumber'], $params['secondNumber'])->jsonSerialize();
    }

    /**
     * @inheritDoc
     */
    public function getSpec(): ?stdClass
    {
        return null;
    }
}