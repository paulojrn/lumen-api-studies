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
    $router->post("series", "SerieController@store");
    $router->get("series", "SerieController@index");
    $router->get("series/{id}", "SerieController@show");
    $router->put("series/{id}", "SerieController@update");
    $router->delete("series/{id}", "SerieController@destroy");
    $router->get("episodios", "SerieController@index");
});
