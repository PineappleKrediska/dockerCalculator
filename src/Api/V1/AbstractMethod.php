<?php

namespace App\Api\V1;

use Throwable;
use UMA\JsonRpc\Error;
use UMA\JsonRpc\Procedure;
use UMA\JsonRpc\Request;
use UMA\JsonRpc\Response;
use UMA\JsonRpc\Success;

abstract class AbstractMethod implements Procedure
{

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request): Response
    {
        try{
            $params = $request->params();
            if (!is_array($params)) {
                $params = json_decode(json_encode($params), true);
            }
            return new Success($request->id(), $this->process($params));
        }catch (Throwable $e){
            //Обработкаошибок но её нет :P
            return new Error(
                -32603,
                'Internal error',
                $e->getMessage(),
                $request->id()
            );
        }
    }

    /**
     * @param array $params
     *
     * @return array
     */
    abstract protected function process(array $params): array;
}