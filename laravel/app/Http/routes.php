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

Route::get('/', [   'uses' => 'PagesController@welcome',
                    'as'   => 'welcome']);


/*
|--------------------------------------------------------------------------
| Route pour la page 'Contact'
|--------------------------------------------------------------------------
*/
Route::get('/Contact', ['uses' => 'PagesController@contact',
                        'as'   => 'contact']);


/*
|--------------------------------------------------------------------------
| Route pour la page 'Mentions légales'
|--------------------------------------------------------------------------
*/
Route::get('/mt', ['uses' => 'PagesController@mention',
                    'as'   => 'mt']);


/*
|--------------------------------------------------------------------------
| Route pour la page 'FAQ'
|--------------------------------------------------------------------------
*/
Route::get('/faq', ['uses' => 'PagesController@faq',
                    'as'   => 'faq']);



/*
|------------------------------------------------------------------------
|           Actors
|------------------------------------------------------------------------
*/

Route::group(['prefix' => 'actors', 'as' => 'actors'], function() {
    /*
    | Route pour la page 'Index'
    */
    Route::get('/index/{ville?}', [ 'uses' => 'ActorsController@index',
                                     'as'   => '.index']);

    /*
    | Route pour la page 'Create'
    */
    Route::get('/create', ['uses' => 'ActorsController@create',
                            'as'  => '.create']);

    /*
    | Route pour la page 'Read'
    */
    Route::get('/read/{id}', ['uses' => 'ActorsController@read',
                               'as'  => '.read'])
    ->where('id', '[0-9]+');

    /*
    | Route pour la page 'Update'
    */
    Route::get('/update/{id}', ['uses' => 'ActorsController@update',
                                'as'   => '.update'])
    ->where('id', '[0-9]+');

    /*
     * Route pour la page 'Delete'
     */
    Route::get('/delete/{id}', ['uses' => 'ActorsController@delete',
                                'as'   => '.delete'])
    ->where('id', '[0-9]+');
});

/*
|------------------------------------------------------------------------
|           Directors
|------------------------------------------------------------------------
*/

Route::group(['prefix' => 'directors', 'as' => 'directors'], function() {
    /*
    | Route pour la page 'Index'
    */
    Route::get('/index/{ville?}', ['uses' => 'DirectorsController@index',
                                    'as'  => '.index']);

    /*
    | Route pour la page 'Create'
    */
    Route::get('/create', ['uses' => 'DirectorsController@create',
                            'as'  => '.create']);

    /*
    | Route pour la page 'Read'
    */
    Route::get('/read/{id}', ['uses' => 'DirectorsController@read',
                               'as'  => '.read'])
    ->where('id', '[0-9]+');

    /*
    | Route pour la page 'Update'
    */
    Route::get('/update/{id}', ['uses' => 'DirectorsController@update',
                                 'as'  => '.update'])
    ->where('id', '[0-9]+');

    /*
    | Route pour la page 'Delete'
    */
    Route::get('/delete/{id}', ['uses' => 'DirectorsController@delete',
                                'as'   => '.delete'])
    ->where('id', '[0-9]+');
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
    Route::get('/index/{column?}/{value?}', ['uses' => 'MoviesController@index',
                                                'as'  => 'movies.index']);

    /*
    | Route pour la page 'Create'
    */
    Route::get('/create', ['uses' => 'MoviesController@create',
                            'as'  => 'movies.create']);

    /*
    | Route pour la page 'Read'
    */
    Route::get('/read/{id}', [  'uses' => 'MoviesController@read',
                                'as'   => 'movies.read'])
    ->where('id', '[0-9]+');

    /*
    | Route pour la page 'Update'
    */
    Route::get('/update/{id}', ['uses' => 'MoviesController@update',
                                'as'   => 'movies.update'])
    ->where('id', '[0-9]+');

    /*
    | Route pour 'Delete'
    */
    Route::get('/delete/{id}', ['uses' => 'MoviesController@delete',
                                'as'   => 'movies.delete'])
    ->where('id', '[0-9]+');

    /*
    | Route pour la page 'Search'
    */
    Route::get('/search/{langue?}/{visibilite?}/{duree?}', ['uses' => 'MoviesController@search',
                                                            'as'   => 'movies.search'])
        ->where(array('langue' => 'fr|en|us', 'visibilite' => '1|2', 'duree' => '[0-9]{1,2}'));

    /*
    | Route pour 'Activate'
    */
    Route::get('/activation/{id}/{activate}/{value}' , ['uses' => 'MoviesController@activate',
                                                        'as'   => 'movies.activate'])
        ->where('id', '[0-9]+');

    /*
    | Route pour 'Select'
    */
    Route::get('/select', ['uses' => 'MoviesController@select',
                                   'as' => 'movies.select']);


});


/*
|------------------------------------------------------------------------
|           Users
|------------------------------------------------------------------------
*/

Route::group(['prefix' => 'users'], function() {
    /*
    | Route pour la page 'Search'
    */
    Route::get('/search/{visible?}/{ville?}/{zipcode?}', [  'uses' => 'UsersController@search',
                                                            'as'   => 'users.search'])
        ->where([   'visible'   => '0|1',
                    'ville'     => '[a-zA-Z-]+',
                    'zipcode'   => '[0-9]{2}']);
});

/**
 * Routing implicit
 * ou le préfix sera users et le controlleur et mes routes seront devinés
 */
Route::controller('users', 'UsersController', [ 'getIndex' => 'users.index',
                                                'getCreate' => 'users.create',
                                                'getRead' => 'users.read',
                                                'getUpdate' => 'users.update',
                                                'getDelete' => 'users.delete']);


/*
|------------------------------------------------------------------------
|           Catégories
|------------------------------------------------------------------------
*/

Route::controller('categories', 'CategoriesController', [ 'getIndex'   => 'categories.index',
                                                          'getCreate'  => 'categories.create',
                                                          'getRead'    => 'categories.read',
                                                          'getUpdate'  => 'categories.update',
                                                          'getDelete'  => 'categories.delete']);



/*
|------------------------------------------------------------------------
|           Cinéma
|------------------------------------------------------------------------
*/

Route::controller('cinemas', 'CinemasController', [ 'getIndex'  => 'cinemas.index',
                                                    'getCreate' => 'cinemas.create',
                                                    'getRead'   => 'cinemas.read',
                                                    'getUpdate' => 'cinemas.update',
                                                    'getDelete' => 'cinemas.delete']);


/*
|------------------------------------------------------------------------
|           Search
|------------------------------------------------------------------------
*/

Route::get('/search', ['uses' => 'PagesController@search', 'as' => 'search']);

