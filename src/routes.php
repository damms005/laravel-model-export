<?php

Route::group(['prefix' => 'laravel-model-export'], function () {

	Route::get(
		'/',
		"Damms005\LaravelModelExport\Controllers\LaravelModelExportController@index"
	)->name('laravel-model-export.index');

	Route::post('download',
		"Damms005\LaravelModelExport\Controllers\LaravelModelExportController@index"
	)->name('laravel-model-export.download');

});
