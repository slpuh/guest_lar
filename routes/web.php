<?php


Route::get('/', 'IndexController@index')->name('index');

Route::post('/', 'IndexController@store')->name('records');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

	Route::get('/', 'IndexController@index')->name('index');

	Route::resource('/records', 'RecordController');
});

Auth::routes();

Route::match(['get', 'post'], 'register', function () {
	Auth::logout();
	return redirect('/');
})->name('register');
