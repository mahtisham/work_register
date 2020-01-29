<?php

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
$router->get('/boards/{board}', 'BoardController@show');
$router->get('/boards', 'BoardController@index');
$router->put('/boards/{board}', 'BoardController@update');
$router->delete('/boards/{board}', 'BoardController@destroy');

// To secure the route use middleware as
//$router->get('/boards', ['middleware'=>'auth','BoardController@index']);
$router->post('/boards', 'BoardController@store');

$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');
$router->post('/register', 'AuthController@register');
