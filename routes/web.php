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

//Route::get('/scraping','ScrapingController@example');

//Route::get('/','ScrapingZomzomController@scrapping_welcome');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');;


/*RUTA PARA EL SCRAPPING*/
Route::get('/scraping-zomzom/{user}/{password}','ScrapingZomzomController@scrapping_start');
/*RUTA PARA EL SCRAPPING*/

Route::resource('/products','ProductsApiController', ['except' => 'show', 'create', 'edit','update','destroy','store']);
