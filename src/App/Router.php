<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use http\Exception\InvalidArgumentException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class Router
{
    public array $routes = [];

    public function __construct(private Container $container) {}

    protected function register(
        RequestMethod $requestMethod,
        string $route,
        callable|array $action,
    ): self {
        $this->routes[$requestMethod->value][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register(RequestMethod::GET, $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register(RequestMethod::POST, $route, $action);
    }

    /**
     * @throws RouteNotFoundException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function resolve(string $requestUri, string $requestMethod): mixed
    {
        $route = explode('?', $requestUri)[0];
        $requestMethod = strtoupper($requestMethod);
        $requestMethodEnum = RequestMethod::tryFrom($requestMethod);

        if ($requestMethodEnum === null) {
            throw new InvalidArgumentException(
                'Unsupported HTTP method: ' . $requestMethod,
            );
        }

        $action = $this->routes[$requestMethodEnum->value][$route] ?? null;

        if (!$action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        [$class, $method] = $action;

        if (class_exists($class)) {
            $instance = $this->container->get($class);

            if (method_exists($instance, $method)) {
                return call_user_func_array([$instance, $method], []);
            }
        }

        throw new RouteNotFoundException();
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}