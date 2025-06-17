<?php

declare(strict_types=1);

namespace tests\Unit;

use App\Router;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    #[Test]
    public function it_registers_a_get_route(): void
    {
        // given that we have a Router object
        $router = new Router();

        // when we call a register method
        $router->get('/users', ['Users', 'index']);

        // then we assert route was registered
        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
        ];

        $this->assertEquals($expected, $router->routes);
    }

    #[Test]
    public function it_registers_a_post_route(): void
    {
        // given that we have a Router object
        $router = new Router();

        // when we call a register method
        $router->post('/users', ['Users', 'store']);

        // then we assert route was registered
        $expected = [
            'post' => [
                '/users' => ['Users', 'store'],
            ],
        ];

        $this->assertEquals($expected, $router->routes);
    }

    #[Test]
    public function it_registers_multiple_routes(): void
    {
        // given that we have a Router object
        $router = new Router();

        // when we call a register method
        $router->get('/users', ['Users', 'index']);
        $router->post('/users', ['Users', 'store']);

        // then we assert route was registered
        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
            'post' => [
                '/users' => ['Users', 'store'],
            ],
        ];

        $this->assertEquals($expected, $router->routes);
    }

    #[Test]
    public function there_are_no_routes_when_router_created(): void
    {
        $router = new Router();

        $this->assertEmpty($router->routes);
    }
}