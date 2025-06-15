<?php

namespace App;

use App\Exceptions\RouteNotFoundException;

class App
{
    public function __construct(protected Router $router)
    {
    }

    public function run()
    {
        try {
            echo $this->router->resolve(
                $_SERVER['REQUEST_URI'],
                $_SERVER['REQUEST_METHOD']
            );
        } catch (RouteNotFoundException) {
            http_response_code(404);

            return View::make('errors/404');
        }
    }
}
