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

$router->group(['prefix' => 'api'], function () use ($router) {

    //authors
    $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);

    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);

    $router->post('authors', ['uses' => 'AuthorController@create']);

    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);

    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);

    //categories
    $router->get('categories',  ['uses' => 'CategoryController@showAllCategories']);

    //$router->get('categoryy',  ['uses' => 'CategoryController@showAllCategory']);

    $router->get('categories/{id}', ['uses' => 'CategoryController@showOneCategory']);

    $router->post('categories', ['uses' => 'CategoryController@create']);

    $router->delete('categories/{id}', ['uses' => 'CategoryController@delete']);

    $router->put('categories/{id}', ['uses' => 'CategoryController@update']);

    //file
    $router->post('upload_book', ['uses' => 'UploadFileController@showUploadFile']);

    $router->get('books',  ['uses' => 'BookController@showAllBooks']);

    $router->get('books/{id}', ['uses' => 'BookController@showOneBook']);

    //home page
    $router->get('home_page', ['uses' => 'HomePageController@showBooksAndCategories']);

});
