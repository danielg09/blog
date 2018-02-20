<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//RUTAS DE FRONTEND

Route::get('/', 'WelcomeController@index')->name('index');

Route::get('categories/{name}', 'WelcomeController@searchCategory')->name('welcome.search.category');

Route::get('tags/{name}', 'WelcomeController@searchTag')->name('welcome.search.tag');

Route::get('articles/{slug}', 'WelcomeController@viewArticle')->name('welcome.view.article');


//RUTAS DE LOGIN

Auth::routes();

//RUTAS DE ADMINISTRACION

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/accesoNoAutorizado',function(){

	return view('admin.template.partials.errorAdmins');

})->name('admin.accesoNoAutorizado');


Route::prefix('admin')->group(function () {

	//rutas de usuario

	//mostrar usuarios
	Route::get('/users', 'UsersController@index')->name('admin.users.index');
	//mostrar form crear usuario
	Route::get('/users/create', 'UsersController@create')->name('admin.users.create');
	//guardar usuario
	Route::post('/users','UsersController@store')->name('admin.users.store');
	//eliminar
    Route::get('/users/destroy/{id}','UsersController@destroy')->name('admin.users.destroy');
    //mostrar el usuario a editar
    Route::get('/users/edit/{id}','UsersController@edit')->name('admin.users.edit');
    //mostrar el usuario a editar
     Route::put('/users/update/{id}','UsersController@update')->name('admin.users.update');


    //rutas de categorias
	
	//mostrar categorias
	Route::get('/categories', 'CategoriesController@index')->name('admin.categories.index');
	//mostrar form crear usuario
	Route::get('/categories/create', 'CategoriesController@create')->name('admin.categories.create');
	//guardar categoria
	Route::post('/categories','CategoriesController@store')->name('admin.categories.store');
	//eliminar
    Route::get('/categories/destroy/{id}','CategoriesController@destroy')->name('admin.categories.destroy');
    //mostrar la categoria a editar
    Route::get('/categories/edit/{id}','CategoriesController@edit')->name('admin.categories.edit');
    //mostrar la categoria a editar
     Route::put('/categories/update/{id}','CategoriesController@update')->name('admin.categories.update');

    //rutas de tags
	
	//mostrar tags
	Route::get('/tags', 'TagsController@index')->name('admin.tags.index');
	//mostrar form crear usuario
	Route::get('/tags/create', 'TagsController@create')->name('admin.tags.create');
	//guardar tags
	Route::post('/tags','TagsController@store')->name('admin.tags.store');
	//eliminar
    Route::get('/tags/destroy/{id}','TagsController@destroy')->name('admin.tags.destroy');
    //mostrar el tags a editar
    Route::get('/tags/edit/{id}','TagsController@edit')->name('admin.tags.edit');
    //mostrar el tags a editar
     Route::put('/tags/update/{id}','TagsController@update')->name('admin.tags.update');

     //ruatas articulos

     //mostrar articulos
	Route::get('/articles', 'ArticlesController@index')->name('admin.articles.index');
	//mostrar form crear articulo
	Route::get('/articles/create', 'ArticlesController@create')->name('admin.articles.create');
	//guardar articulos
	Route::post('/articles','ArticlesController@store')->name('admin.articles.store');
	//eliminar
    Route::get('/articles/destroy/{id}','ArticlesController@destroy')->name('admin.articles.destroy');
    //mostrar el articulo a editar
    Route::get('/articles/edit/{id}','ArticlesController@edit')->name('admin.articles.edit');
    //mostrar el articulo a editar
     Route::put('/articles/update/{id}','ArticlesController@update')->name('admin.articles.update');


    //mostrar imagenes
	Route::get('/images', 'ImagesController@index')->name('admin.images.index');
	//mostrar el imagenes a editar
    Route::get('/images/edit/{id}','ImagesController@edit')->name('admin.images.edit');
    //mostrar el articulo a editar
     Route::put('/images/update/{id}','ImagesController@update')->name('admin.images.update');
});


