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


$router->get( '/posts', 'PostController@index' );
$router->get( '/posts/{id}', 'PostController@show' );
$router->post( '/posts', 'PostController@create' );
$router->put( '/posts/{id}','PostController@update' );
$router->delete( '/posts/{id}', 'PostController@delete' );

$router->get( '/post/do/seed', 'PostController@seed' );
