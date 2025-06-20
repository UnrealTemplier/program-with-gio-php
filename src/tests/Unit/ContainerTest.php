<?php

declare(strict_types=1);

namespace tests\Unit;

use App\Container;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    #[Test]
    public function it_should_bind_an_entry(): void
    {
        $id = ContainerTest::class;

        $container = new Container();

        $has = $container->has($id);
        self::assertFalse($has);

        $container->set($id, "");

        $has = $container->has($id);
        self::assertTrue($has);
    }

    #[Test]
    public function it_should_get_a_callable(): void
    {
        $id = Container::class;

        $container = new Container();

        $container->set($id, fn() => new Container());

        $actual = $container->get($id);
        $actualIsContainer = $actual instanceof Container;

        self::assertTrue($actualIsContainer);
    }

    #[Test]
    public function it_should_resolve(): void
    {
        $id = Container::class;

        $container = new Container();

        $actual = $container->get($id);
        $actualIsContainer = $actual instanceof Container;

        self::assertTrue($actualIsContainer);
    }

    #[Test]
    public function it_should_resolve_with_dependencies(): void
    {
        $targetClass = new class(new Container()) {
            public function __construct(
                public Container $container
            ) {}
        };

        $container = new Container();

        $result = $container->get($targetClass::class);
        $resultContainerProperty = $result->container;

        $isResultTargetClass = $result instanceof $targetClass;
        $isResultDepContainer = $resultContainerProperty instanceof Container;

        self::assertTrue($isResultTargetClass);
        self::assertTrue($isResultDepContainer);
    }
}
