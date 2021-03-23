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
$router->group(['prefix' => 'staff'], function () use ($router) {
    $router->post('add', ['uses' => 'Staff\StaffController@add']);
    $router->post('assign', ['uses' => 'Staff\StaffController@assign']);
});                     

// branch related routes
$router->group(['prefix' => 'branch'], function () use ($router) {
    $router->post('add', ['uses' => 'Branch\BranchController@add']);
});

// event related routes
$router->group(['prefix' => 'event'], function () use ($router) {
    $router->post('add', ['uses' => 'Event\EventController@add']);
    $router->post('assign/{id}', ['uses' => 'Event\EventController@assign']);
    $router->get('detail/{id}', ['uses' => 'Event\EventController@getEvent']);
});