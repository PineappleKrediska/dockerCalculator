<?php

namespace App\Api\Internal\V1;

use App\Service\HistoryService;
use stdClass;

class GetHistory extends AbstractMethod
{
    protected HistoryService $historyService;
    /**
     * @inheritDoc
     */
    protected function process(array $params): array
    {
        return $this->historyService->getHistory();
    }

    /**
     * @inheritDoc
     */
    public function getSpec(): ?stdClass
    {
        return null;
    }
}