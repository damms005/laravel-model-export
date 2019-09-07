<?php

return [
	'exportableModels' => [
		\App\User::class => [
			"id"         => "int",
			"created_at" => "datetime",
			"updated_at" => "datetime",
		],
	],
];
