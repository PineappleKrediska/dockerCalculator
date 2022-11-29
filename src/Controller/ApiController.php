<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;
use UMA\JsonRpc\Server;

class ApiController extends AbstractController
{

    /**
     * @param Server $server
     * @param Server $internalServer
     */
    public function __construct(
        private Server $server,
        private Server $internalServer
    )
    {
    }

    /**
     * @Route (path="/api/v1", name="api_v1")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function v1(Request $request): Response
    {

        try {
            $response = $this->server->run($request->getContent());

            return new Response($response, 200, [
                'Content-Type' => 'application/json',
            ]);
        } catch (Throwable $e) {
            return new Response(json_encode([
                'jsonrpc' => '2.0',
                'error' => [
                    'code' => -32603,
                    'message' => 'Internal 1111111error',
                    'data' => $e->getMessage()
                ],
            ]));
        }
    }
    /**
     * @Route (path="/internal/api/v1", name="internal_api_v1")
     * @param Request $request
     *
     * @return Response
     */
    public function internalV1(Request $request): Response
    {
        try {
            $response = $this->internalServer->run($request->getContent());

            return new Response($response, 200, [
                'Content-Type' => 'application/json',
            ]);
        } catch (Throwable $e) {
            return new Response(json_encode([
                'jsonrpc' => '2.0',
                'error' => [
                    'code' => -32603,
                    'message' => 'Internal error',
                ],
            ]));
        }
    }


}