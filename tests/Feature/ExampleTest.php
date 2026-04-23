<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_route_binding_will_fail(): void
    {
        class_exists('Request'); // or just any code attempting to use alias; e.g. $foo = new \Request();

        Route::group(['controller' => ExampleController::class], function () {
            Route::get('/index', 'index');
            Route::get('/request', 'request');
            Route::get('/vite', 'vite');
        });

        $response = $this->get('/vite');
        $response->assertStatus(200);
    }
}

class ExampleController
{
    public function index()
    {
        return 'Hello World';
    }

    public function request()
    {
        return 0;
    }

    public function vite()
    {
        return 1;
    }
}
