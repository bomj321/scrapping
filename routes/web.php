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

Route::get('/','ScrapingZomzomController@scrapping_welcome');
Route::get('/scraping-zomzom','ScrapingZomzomController@scrapping_start');
