<?php

declare(strict_types=1);

namespace tests\Unit;

use App\Router;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    #[Test]
    public function it_registers_a_route(): void
    {
        // given that we have a Router object
        $router = new Router();

        // when we call a register method
        $router->get('/users', ['Users', 'index']);
        $router->post('/users', ['Users', 'index']);

        // then we assert route was registered
        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ],
            'post' => [
                '/users' => ['Users', 'index']
            ],
        ];

        $this->assertEquals($expected, $router->getRoutes());
    }
}