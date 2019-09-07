<?php

namespace Damms005\LaravelModelExport;

use Illuminate\Support\ServiceProvider;

class LaravelModelExportServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->make('Damms005\LaravelModelExport\Controllers\LaravelModelExportController');
		$this->loadViewsFrom(__DIR__ . '/../views', 'laravel-model-export');
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{

		include __DIR__ . '/routes.php';

		$this->publishes([
			__DIR__ . '/../config/laravel-model-export.php' => config_path('laravel-model-export.php'),
			__DIR__ . '/../assets/'                         => public_path('vendor/laravel-model-export.php/'),
		], 'laravel-model-export');
	}
}
