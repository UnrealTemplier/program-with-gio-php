<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use App\Services\PaymentGatewayService;
use App\Services\PaymentGatewayServiceInterface;

class App
{
    private static DB $db;

    public function __construct(
        protected Container $container,
        protected Router $router,
        protected array $request,
        protected Config $config,
    ) {
        static::$db = new DB($config->db ?? []);

        $this->container->set(
            PaymentGatewayServiceInterface::class,
            PaymentGatewayService::class,
        );
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve(
                $this->request['uri'],
                $this->request['method'],
            );
        } catch (RouteNotFoundException) {
            http_response_code(404);

            echo View::make('errors/404');
        }
    }

    public static function db(): DB
    {
        return static::$db;
    }
}
