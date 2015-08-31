<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Route pour la page 'Contact'
|--------------------------------------------------------------------------
*/
Route::get('/Contact', ['uses' => 'PagesController@contact']);


/*
|--------------------------------------------------------------------------
| Route pour la page 'Mentions légales'
|--------------------------------------------------------------------------
*/
Route::get('/mentions-legales', function () {

    return view('Pages/mt');
});


/*
|--------------------------------------------------------------------------
| Route pour la page 'FAQ'
|--------------------------------------------------------------------------
*/
Route::get('/faq', function () {

    return view('Pages/faq');
});



/*
|------------------------------------------------------------------------
|           Actors
|------------------------------------------------------------------------
*/

Route::group(['prefix' => 'actors'], function() {
    /*
    | Route pour la page 'Index'
    */
    Route::get('/index', ['uses' => 'ActorsController@index']);

    /*
    | Route pour la page 'Create'
    */
    Route::get('/create', ['uses' => 'ActorsController@create']);

    /*
    | Route pour la page 'Read'
    */
    Route::get('/read/{id}', ['uses' => 'ActorsController@read']);

    /*
    | Route pour la page 'Update'
    */
    Route::get('/update/{id}', ['uses' => 'ActorsController@update']);

    /*
     * Route pour la page 'Delete'
     */
    Route::get('/delete/{id}', ['uses' => 'ActorsController@delete']);
});

/*
|------------------------------------------------------------------------
|           Directors
|------------------------------------------------------------------------
*/

Route::group(['prefix' => 'directors'], function() {
    /*
    | Route pour la page 'Index'
    */
    Route::get('/index', ['uses' => 'DirectorsController@index']);

    /*
    | Route pour la page 'Create'
    */
    Route::get('/create', ['uses' => 'DirectorsController@create']);

    /*
    | Route pour la page 'Read'
    */
    Route::get('/read/{id}', ['uses' => 'DirectorsController@read']);

    /*
    | Route pour la page 'Update'
    */
    Route::get('/update/{id}', ['uses' => 'DirectorsController@update']);

    /*
    | Route pour la page 'Delete'
    */
    Route::get('/delete/{id}', ['uses' => 'DirectorsController@delete']);
});

/*
|------------------------------------------------------------------------
|           Movies
|------------------------------------------------------------------------
*/

Route::group(['prefix' => 'movies'], function() {
    /*
    | Route pour la page 'Index'
    */
    Route::get('/index', ['uses' => 'MoviesController@index']);

    /*
    | Route pour la page 'Create'
    */
    Route::get('/create', ['uses' => 'MoviesController@create']);

    /*
    | Route pour la page 'Read'
    */
    Route::get('/read/{id}', ['uses' => 'MoviesController@read']);

    /*
    | Route pour la page 'Update'
    */
    Route::get('/update/{id}', ['uses' => 'MoviesController@update']);

    /*
    | Route pour la page 'Delete'
    */
    Route::get('/delete/{id}', ['uses' => 'MoviesController@delete']);
});













