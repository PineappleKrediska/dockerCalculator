<?php

namespace App\Api;

use Symfony\Component\DependencyInjection\ContainerInterface;
use UMA\JsonRpc\Server;

class ServerFactory
{
    /**
     * @param ContainerInterface $container
     * @param array $methods
     * @param array $middlewares
     *
     * @return Server
     */
    public static function create(ContainerInterface $container, array $methods, array $middlewares = []): Server
    {
        $server = new Server($container);
        foreach ($middlewares as $middleware) {
            $server->attach($middleware);
        }
        foreach ($methods as $method => $serviceId) {
            $server->set($method, $serviceId);
        }

        return $server;
    }
}