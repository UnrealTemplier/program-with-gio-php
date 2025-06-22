<?php

declare(strict_types=1);

namespace App;

use App\Enums\RequestMethod;
use App\Exceptions\RouteNotFoundException;
use http\Exception\InvalidArgumentException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionClass;
use ReflectionException;

class Router
{
    protected array $routes = [];

    public function __construct(private readonly Container $container) {}

    protected function register(
        RequestMethod $requestMethod,
        string $route,
        callable|array $action,
    ): self {
        $this->routes[$requestMethod->value][$route] = $action;
        return $this;
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

    /**
     * @throws ReflectionException
     */
    public function registerRoutesFromControllerAttributes(array $controllers): void
    {
        foreach ($controllers as $controller) {
            $reflectionController = new ReflectionClass($controller);

            foreach ($reflectionController->getMethods() as $method) {
                $attributes = $method->getAttributes();

                foreach ($attributes as $attribute) {
                    $route = $attribute->newInstance();

                    $this->register($route->method, $route->path, [$controller, $method->getName()]);
                }
            }
        }
    }
}