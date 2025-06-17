<?php

declare(strict_types=1);

namespace tests\Unit;

use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use tests\DataProviders\RouterDataProvider;

final class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();

        $this->router = new Router();
    }

    #[Test]
    public function it_registers_a_get_route(): void
    {
        // when we call a register method
        $this->router->get('/users', ['Users', 'index']);

        // then we assert route was registered
        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
        ];

        $this->assertEquals($expected, $this->router->getRoutes());
    }

    #[Test]
    public function it_registers_a_post_route(): void
    {
        // when we call a register method
        $this->router->post('/users', ['Users', 'store']);

        // then we assert route was registered
        $expected = [
            'post' => [
                '/users' => ['Users', 'store'],
            ],
        ];

        $this->assertEquals($expected, $this->router->getRoutes());
    }

    #[Test]
    public function it_registers_multiple_routes(): void
    {
        // when we call a register method
        $this->router->get('/users', ['Users', 'index']);
        $this->router->post('/users', ['Users', 'store']);

        // then we assert route was registered
        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
            'post' => [
                '/users' => ['Users', 'store'],
            ],
        ];

        $this->assertEquals($expected, $this->router->getRoutes());
    }

    #[Test]
    public function there_are_no_routes_when_router_created(): void
    {
        $this->assertEmpty(new Router()->getRoutes());
    }

    #[Test]
    #[DataProviderExternal(RouterDataProvider::class, 'routeNotFoundCases')]
    public function it_throws_route_not_found_exception(
        string $requestUri,
        string $requestMethod
    ): void
    {
        $users = new class() {
            public function delete(): bool
            {
                return true;
            }
        };

        $this->router->get('/users', ['Users', 'index']);
        $this->router->post('/users', [$users::class, 'store']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }
}