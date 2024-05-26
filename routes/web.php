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

// Routes for Site1
$router->get('/users1', 'UserRelatedController@index');
$router->post('/users1', 'UserRelatedController@add');
$router->get('/users1/{id}', 'UserRelatedController@show');
$router->put('/users1/{id}', 'UserRelatedController@update');
//$router->delete('/users1/{id}', 'UserRelatedController@delete');

$router->get('/reviews1', 'ReviewRelatedController@index');
$router->post('/reviews1', 'ReviewRelatedController@add');
$router->get('/reviews1/{id}', 'ReviewRelatedController@show');
$router->put('/reviews1/{id}', 'ReviewRelatedController@update');
//$router->delete('/reviews1/{id}', 'ReviewRelatedController@delete');

$router->get('/libraries1', 'LibraryRelatedController@index');
$router->post('/libraries1', 'LibraryRelatedController@add');
$router->get('/libraries1/{id}', 'LibraryRelatedController@show');
$router->put('/libraries1/{id}', 'LibraryRelatedController@update');
//$router->delete('/libraries1/{id}', 'LibraryRelatedController@delete');

// Routes for Site2
$router->get('/books1', 'BookRelatedController@index');
$router->post('/books1', 'BookRelatedController@add');
$router->get('/books1/{id}', 'BookRelatedController@show');
$router->put('/books1/{id}', 'BookRelatedController@update');
//$router->delete('/books1/{id}', 'BookRelatedController@delete');

$router->get('/ebooks/{keyword}', 'GatewayController@getFreeBooks');