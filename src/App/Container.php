<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\Container\ContainerException;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionUnionType;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id): mixed
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];

            if (is_callable($entry)) {
                return $entry($this);
            }

            $id = $entry;
        }

        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable|string $concrete): void
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(string $id): mixed
    {
        $reflectionClass = new ReflectionClass($id);

        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException("Class {$id} is not instantiable");
        }

        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $id;
        }

        $parameters = $constructor->getParameters();

        if (!$parameters) {
            return new $id;
        }

        $dependencies = $this->getDependencies($id, $parameters);

        return $reflectionClass->newInstanceArgs($dependencies);
    }

    private function getDependencies(string $class, array $parameters): array
    {
        return array_map(function (ReflectionParameter $param) use ($class) {
            $name = $param->getName();
            $type = $param->getType();

            if (!$type) {
                throw new ContainerException(
                    "Failed to resolve class {$class} because param {$name} doesn't have a type hint",
                );
            }

            if ($type instanceof ReflectionUnionType) {
                throw new ContainerException(
                    "Failed to resolve class {$class} because param {$name} is a union type",
                );
            }

            if ($type instanceof ReflectionNamedType && !$type->isBuiltin()) {
                return $this->get($type->getName());
            }

            throw new ContainerException(
                "Failed to resolve class {$class} because param {$name} is invalid",
            );
        }, $parameters);
    }
}