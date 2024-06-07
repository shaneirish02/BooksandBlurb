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

$router->group(['middleware' => 'client.credentials'], function () use ($router) {

    /*
    $router->get('/books', 'GatewayController@searchBooks');
    //$router->get('/searchBook', 'GatewayController@search');
    $router->get('/searchAnime', 'GatewayController@searchAnime');
    */

    $router->get('/search', 'BookFinderController@searchBooks');
    $router->get('/get-book', 'AllBooksApiController@search');
    $router->get('/manga-reco', 'MyAnimeListController@getMangaRecommendations');
    $router->get('/details/{id}', 'MyAnimeListController@getMangaDetails');

    $router->get('/users1', 'UserController@index');
    $router->get('/users1/{id}', 'UserController@show');
    $router->put('/users1/{id}', 'UserController@update');
    $router->delete('/users1/{id}', 'UserController@delete');

    $router->get('/logs1', 'AuthenticationLogController@index');
    $router->get('/logs1/{id}', 'AuthenticationLogController@show');
    $router->delete('/logs1/{id}', 'AuthenticationLogController@delete');

});

    $router->post('/users1', 'UserController@add');