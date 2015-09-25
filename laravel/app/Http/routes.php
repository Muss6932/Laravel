<?php


/*========================================================================*/

/**
 * Routes implicites vers mes controlleurs préconcues car ces controlleurs use
 * traits avec les fonctionnalités de l'authentification déjà faite
 * (login, password ...)
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);


//------------ GROUPE ADMIN
//------------
Route::group([  'prefix' => 'admin',
                'middleware' => 'auth'], function () {



Route::controller('api', 'ApiController');

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






/*
|--------------------------------------------------------------------------
| Route pour la page 'Contact'
|--------------------------------------------------------------------------
*/


/*
| Route pour la page 'welcome'
*/
Route::get('/', [   'uses' => 'PagesController@welcome',
                    'as'   => 'welcome']);

/*
| Route pour la page 'postmessage'
*/
Route::post('message-create', [   'uses' => 'PagesController@createMessage',
                                   'as'   => 'message.create']);



/*
| Route pour la page 'welcome advanced'
*/
Route::get('/advanced', [ 'uses' => 'PagesController@welcomeAdvanced',
                            'as' => 'welcome.advanced']);


/*
| Route pour la page 'welcome advanced'
*/
Route::get('/professional', ['uses' => 'PagesController@welcomeProfessional',
    'as' => 'welcome.professional']);

/*
| Route pour réceptionner des données du formulaires (ajout de film light)
 */
Route::post('post-movie', ['uses' => 'PagesController@addMovie',
                             'as' => 'welcome.post.movie']);

/*
| Route pour réceptionner des données du formulaires (ajout de film light)
*/
Route::get('select-tasks', ['uses' => 'PagesController@selectTasks',
                               'as' => 'welcome.select.task']);


/*
 * Route pour le realtime
 */
Route::get('seanceajax', [  'uses' => 'PagesController@ajax',
                            'as'   => 'welcome.ajax']);



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
|           Search
|------------------------------------------------------------------------
*/

Route::get('/search', ['uses' => 'PagesController@search', 'as' => 'search']);








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
    | Route pour réceptionner des données du formulaires
     */
    Route::post('/post', [ 'uses' => 'ActorsController@store',
                            'as'  => '.post']);

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
    | Route pour réceptionner des données du formulaires
     */
    Route::post('/post', ['uses' => 'DirectorsController@store',
        'as' => '.post']);

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
    | Route pour réceptionner des données du formulaires
     */
    Route::post('/post', ['uses' => 'MoviesController@store',
                            'as' => 'movies.post']);


    /*
    | Route pour la page 'Read'
    */
    Route::get('/read/{id}', [  'uses' => 'MoviesController@read',
                                'as'   => 'movies.read'])
    ->where('id', '[0-9]+');

    /*http://localhost:8000/color-builder.html
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
    Route::get('/select', [   'uses' => 'MoviesController@select',
                                'as' => 'movies.select']);


    /*
    | Route pour 'Trash'
    */
    Route::get('/trash', ['uses' => 'MoviesController@trash',
                            'as' => 'movies.trash']);

    /*
    | Route pour 'Restore'
    */
    Route::get('/restore/{id}', ['uses' => 'MoviesController@restore',
                                   'as' => 'movies.restore']);

    Route::post('/comments/{id}', ['uses' => 'MoviesController@comment',
                                     'as' => 'movies.comments'])
        ->where('id', '[0-9]+');

    /*
    | Route pour 'MoviesLiked'
    */
    Route::get('/session/{id}', ['uses' => 'MoviesController@moviesLiked',
                                   'as' => 'movies.moviesLiked']);


    /*
    | Route pour 'Categorie Update'
    */
    Route::post('/categorieupdate/{id}', ['uses' => 'MoviesController@categorieUpdate',
                                            'as' => 'movies.categorieUpdate']);

    /*
    | Route pour 'Actors Update'
    */
    Route::post('/actorsupdate/{id}', ['uses' => 'MoviesController@actorsUpdate',
                                         'as' => 'movies.actorsUpdate']);



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

/*
| Route pour réceptionner des données du formulaires
*/
Route::post('cinemas/post/{id}', ['uses' => 'CinemasController@store',
    'as' => 'cinemas.post'])
    ->where('id', '[0-9]+');


Route::controller('cinemas', 'CinemasController', [ 'getIndex'  => 'cinemas.index',
                                                    'getCreate' => 'cinemas.create',
                                                    'getRead'   => 'cinemas.read',
                                                    'getUpdate' => 'cinemas.update',
                                                    'getDelete' => 'cinemas.delete',
                                                    'getSeance' => 'cinemas.seance']);


/*
|------------------------------------------------------------------------
|           Commentaires
|------------------------------------------------------------------------
*/

Route::controller('comments', 'CommentsController', [   'getIndex'      => 'comments.index',
                                                        'getDelete'     => 'comments.delete',
                                                        'getSelect'     => 'comments.select',
                                                        'postContent'   => 'comments.contentUpdate'
]);

/*
| Route pour 'CommentsLiked'
*/
Route::get('/session/{id}', ['uses' => 'CommentsController@commentsLiked',
                               'as' => 'comments.commentsLiked']);



/*
|------------------------------------------------------------------------
|           PROFIL
|------------------------------------------------------------------------
*/

Route::get('/update', ['uses' => 'Auth\AuthController@update', 'as' => 'profil.update']);
Route::post('/maj', ['uses' => 'Auth\AuthController@maj', 'as' => 'profil.maj']);



//---------Fermeture groupe admin
//---------
});
