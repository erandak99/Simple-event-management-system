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

// event related routes
$router->group(['prefix' => 'event'], function () use ($router) {
    $router->post('add', ['uses' => 'Event\EventController@add']);
    $router->post('assign', ['uses' => 'Event\EventController@assignBranch']);
    $router->get('detail/{id}', ['uses' => 'Event\EventController@getEvent']);
});
