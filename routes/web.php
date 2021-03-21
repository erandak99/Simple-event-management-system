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

// staff related routes
$router->group(['prefix' => 'api/staff'], function () use ($router) {
    $router->post('add', ['uses' => 'StaffController@add']);
    $router->post('assign', ['uses' => 'StaffController@assign']);
});                     

// branch related routes
$router->group(['prefix' => 'api/branch'], function () use ($router) {
    $router->post('add', ['uses' => 'BranchController@add']);
});

// event related routes
$router->group(['prefix' => 'api/event'], function () use ($router) {
    $router->post('add', ['uses' => 'EventController@add']);
    $router->post('assign/{id}', ['uses' => 'EventController@assign']);
    $router->get('detail/{id}', ['uses' => 'EventController@getEvent']);
});