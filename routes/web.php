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

Auth::routes();

Route::get('/home', 'LanguageController@index')->name('home');
Route::get('/', 'LanguageController@index');
Route::get('/language/{languageShortcut}', 'LanguageController@show');
Route::get('/language/{languageShortcut}/edytuj', 'LanguageController@edit');

Route::get('/language/{languageShortcut}/{subcategoryName}', 'SubcategoryController@show');
Route::get('/language/{languageShortcut}/{subcategoryName}/edytuj', 'SubcategoryController@edit');
Route::get('/subcategory/back/{subcategory}', 'SubcategoryController@back');
Route::post('/subcategory/store/{languageId}', 'SubcategoryController@store');
Route::delete('/subcategory/delete/{subcategoryId}', 'SubcategoryController@destroy');
Route::patch('/subcategory/rename/{subcategoryId}', 'SubcategoryController@update');

Route::get('/language/{languageShortcut}/{subcategoryName}/{setName}', 'SetController@show');
Route::get('/language/{languageShortcut}/{subcategoryName}/{setName}/edycja', 'SetController@edit');
Route::get('/set/back/{set}', 'SetController@back');
Route::post('/set/store/{subcategoryId}', 'SetController@store');
Route::delete('/set/delete/{setId}', 'SetController@destroy');
Route::patch('/set/rename/{setId}', 'SetController@update');

Route::post('/word/store/{setId}', 'WordController@store');
Route::delete('/word/delete/{wordId}', 'WordController@destroy');
Route::patch('/word/rename/{wordId}', 'WordController@update');

Route::get('/language/{languageShortcut}/{subcategoryName}/{setName}/cwicz', 'LearnController@index');
Route::post('learn/index/{set}', 'LearnController@learn');
Route::post('learn/check/{set}', 'LearnController@check');

Route::get('/language/{languageShortcut}/{subcategoryName}/{setName}/test', 'LearnController@testIndex');
Route::post('/test/start/{set}', 'LearnController@testStart');
Route::post('/test/result/{set}', 'LearnController@testResult');

Route::get('/user/index', 'UserController@index');
Route::get('/user/users', 'UserController@users');
Route::delete('/user/delete/{userId}', 'UserController@userDestroy');
Route::patch('/user/edit/{userId}', 'UserController@userEdit');
Route::get('/user/permissions', 'UserController@permissions');
Route::delete('/user/permissions/delete/{userId}/{subcategoryId}', 'SubcategoryUserController@destroy');
Route::post('/user/permissions/add', 'SubcategoryUserController@store');

Route::get('/user/languages', 'UserController@languages');
Route::delete('/user/languages/delete/{languageId}', 'LanguageController@destroy');
Route::patch('/user/languages/rename/{languageId}', 'LanguageController@update');
Route::post('/user/languages/add/', 'LanguageController@store');
Route::delete('/user/languages/subcategory/delete/{subcategoryId}', 'SubcategoryController@destroy');
