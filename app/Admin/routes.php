<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('categories', CategoriesController::class);
    $router->resource('topics', TopicsController::class);
    $router->get('api/categories', 'CategoriesController@apiIndex');
    $router->resource('labels', LabelsController::class);
    $router->resource('links', LinksController::class);
});
