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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('banks', 'BanksController');

Route::resource('branches', 'BranchesController');

Route::get('search', 'BranchesController@search')->name('search');

Route::get('autocomplete', 'BranchesController@autocomplete')->name('autocomplete');

Route::get('searchbank', 'BanksController@search')->name('searchbank');

Route::get('autocompletebank', 'BanksController@autocomplete')->name('autocompletebank');

Route::get('searchifsc', 'BranchesController@searchifsc')->name('searchifsc');

Route::get('autocompleteifsc', 'BranchesController@autocompleteifsc')->name('autocompleteifsc');
