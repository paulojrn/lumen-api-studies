<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\SerieController;

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

$router->group(["prefix" => "api"], function () use ($router) {
    $router->group(["prefix" => "series"], function () use ($router) {
        $router->post("", "SerieController@store");
        $router->get("", "SerieController@index");
        $router->get("{id}", "SerieController@show");
        $router->put("{id}", "SerieController@update");
        $router->delete("{id}", "SerieController@destroy");
    });

    $router->group(["prefix" => "episodios"], function () use ($router) {
        $router->post("", "EpisodioController@store");
        $router->get("", "EpisodioController@index");
        $router->get("{id}", "EpisodioController@show");
        $router->put("{id}", "EpisodioController@update");
        $router->delete("{id}", "EpisodioController@destroy");
    });
});
