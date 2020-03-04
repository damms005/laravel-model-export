<?php

namespace Damms005\LaravelModelExport\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class LaravelModelExportController extends Controller
{
	/**
	 * The cache of snake-cased words.
	 *
	 * @var array
	 */
	protected static $snakeCache = [];

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

		$model = $request->input('model');

		$items = (new $model())
			->when($request->filled('filterLower'), function ($query) use ($filterProperty, $request) {
				$query
					->where($filterProperty, '>=', $request->input('filterLower'))
					->where($filterProperty, '<=', $request->input('filterUpper'));
			})
			->get();

		if ($items->isEmpty()) {
			return "No items in the selected range";
		} else {
			return (new FastExcel($items))->configureCsv('\t', '', '\n', "UTF-8")->download("{$this->snake($model)}-" . \date(DATE_ATOM) . ".xlsx");
		}
	}

	/**
	 * Convert a string to snake case.
	 *
	 * @param  string  $value
	 * @param  string  $delimiter
	 * @return string
	 */
	public static function snake($value, $delimiter = '_')
	{
		$key = $value;

		if (isset(static::$snakeCache[$key][$delimiter])) {
			return static::$snakeCache[$key][$delimiter];
		}

		if (!ctype_lower($value)) {
			$value = preg_replace('/\s+/u', '', ucwords($value));

			$value = static::lower(preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value));
		}

		return static::$snakeCache[$key][$delimiter] = $value;
	}

	/**
	 * Convert the given string to lower-case.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public static function lower($value)
	{
		return mb_strtolower($value, 'UTF-8');
	}
}
