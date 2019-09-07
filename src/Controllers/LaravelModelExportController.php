<?php

namespace Damms005\LaravelModelExport\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class LaravelModelExportController extends Controller
{
	public function index()
	{
		// provides an interface where all models are listed, and
		// you can follow the simple step to export:
		//1. Select the target model
		//2. Select lower range for download filter
		//3. Select upper range for download filter
		//4. Download

		$exportableModels = config('laravel-model-export.exportableModels');
		return view('laravel-model-export::index', compact('exportableModels'));
	}

	public function download(Request $request)
	{
		//get lower range
		//get upper range
		//apply it to model
		$model = $request->input('model');
		(new FastExcel($users))->export('file.xlsx');
	}
}
