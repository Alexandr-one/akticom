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

/**
 * Страница с формой
 */
Route::get('/','MainController@index');
/**
 * Парсинг
 */
Route::post('/import_parse', 'MainController@parseImport')->name('import_parse');
/**
 * Страница со всеми продуктами
 */
Route::get('/products','MainController@getProducts')->name('get.products');
