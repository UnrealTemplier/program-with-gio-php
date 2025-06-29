<?php

declare(strict_types=1);

namespace App;

use App\Contracts\EmailValidationInterface;
use App\Exceptions\RouteNotFoundException;
use App\Services\EmailValidation\Emailable\EmailValidationService;
use Dotenv\Dotenv;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionException;

class App
{
    protected Config $config;

    public function __construct(
        protected(set) Container $container {
            get {
                return $this->container;
            }
        },
        protected ?Router $router = null,
        protected array $request = [],
    ) {}

    /**
     * @throws ReflectionException
     */
    public function boot(): static
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $this->config = new Config($_ENV);
        $this->initDb($this->config->db);

        $this->container->bind(
            EmailValidationInterface::class,
            fn() => new EmailValidationService($this->config->apiKeys['emailable']),
        );

        return $this;
    }

    protected function initDb(array $config): void
    {
        $capsule = new Capsule();
        $capsule->addConnection($config);
        $capsule->setEventDispatcher(new Dispatcher());
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
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
}
