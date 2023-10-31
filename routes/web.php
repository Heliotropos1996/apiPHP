<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(["middleware" => "auth"], function () use ($router) {

    /*
        * (path, controller@method)
        */
    $router->get("/ruta", function () use ($router) {
        return "accediste";
    });
    $router->post("register", "AuthController@register");
    $router->post("login", "AuthController@login");
});

$router->group(["prefix" => "api/v1"], function () use ($router) {



    $router->group(["prefix" => "users"], function () use ($router) {

        /*
        * (path, controller@method)
        */
        $router->get("", "UserController@getAllUsers");
        $router->get("/{id}", "UserController@getUserById");
        $router->post("", "UserController@createUser");
        $router->put("/{id}", "UserController@updateUser");
        $router->delete("/{id}", "UserController@deleteUser");
        $router->get("restore/{id}", "UserController@restoreUser");
    });
});
