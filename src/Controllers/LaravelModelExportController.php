<?php

namespace Damms005\LaravelModelExport\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class LaravelModelExportController extends Controller
{
	public function index()
	{
		$configuredModels = collect(config('laravel-model-export.exportableModels'));
		$exportableModels = [];
		$configuredModels->each(function ($modelName) use (&$exportableModels) {
			$table                        = (new $modelName)->getTable();
			$exportableModels[$modelName] =
			collect($this->getTableColumns($table))->filter(function ($column) use ($table) {
				return in_array(DB::connection()->getDoctrineColumn($table, $column)->getType()->getName(), ['integer', 'bigint', 'date', 'datetime']);
			})->toArray();
		});

		return view('laravel-model-export::index', compact('exportableModels'));
	}

	public function getTableColumns($table)
	{
		return DB::getSchemaBuilder()->getColumnListing($table);
	}

	public function download(Request $request)
	{
		$filterProperty = $request->input('filterProperty');
		$model          = $request->input('model');
		$items          = (new $model())
			->where($filterProperty, '>=', $request->input('filterLower'))
			->where($filterProperty, '<=', $request->input('filterUpper'))
			->get();

		if ($items->isEmpty()) {
			return "No items in the selected range";
		} else {
			return (new FastExcel($items))->configureCsv('\t', '', '\n', "UTF-8")->download('file.xlsx');
		}
	}
}
