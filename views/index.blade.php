<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laravel Model Export</title>
	<link rel="stylesheet" href="{{asset('vendor/laravel-model-export.php/css/tailwind.css')}}">
	<link rel="stylesheet" href="{{asset('vendor/laravel-model-export.php/css/tailwind-v1.css')}}">
</head>

<body>
	@dump($exportableModels)
</body>

</html>