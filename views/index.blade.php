<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laravel Model Export</title>
	<link rel="stylesheet" href="{{asset('vendor/laravel-model-export.php/css/tailwind.css')}}">
	<link rel="stylesheet" href="{{asset('vendor/laravel-model-export.php/css/tailwind-v1.css')}}">
	<script type="text/javascript" src="{{asset('vendor/laravel-model-export.php/js/vue.js')}}"></script>
</head>

<body>
	<form method="POST" action="{{route('laravel-model-export.download')}}">
		{{ csrf_field() }}
		<div id="laravel-model-export" class="p-24 hover:bg-grey-lightest">
			<h2 class="font-bold mt-4">Model</h2>
			<select class="w-64 p-2 border rounded" name="model" v-model="selectedModel">
				<option selected></option>
				<option v-for=" modelEntry , modelName  in exportableModels " :value="modelName">${modelName}</option>
			</select>

			<h2 class="font-bold mt-4">Filter Property:</h2>
			<select class="w-64 p-2 border rounded" name="filterProperty" v-model="modelFilterProperty">
				<option selected></option>
				<option v-for=" property in ( displayedModel ? Object.values( displayedModel ) : {} ) " :value="property">${property}</option>
			</select>

			<h2 class="font-bold mt-4">Lower Filter Range</h2>
			<input class="w-64 p-2 border rounded" type="text" name="filterLower" id="">

			<h2 class="font-bold mt-4">Upper filter range</h2>
			<input class="w-64 p-2 border rounded" type="text" name="filterUpper" id="">

			<br>
			<br>
			<input class="rounded p-2 border bg-blue" type="submit" value="Submit">
		</div>
	</form>

	<script>
		new Vue({
			el: '#laravel-model-export',
			delimiters: ['${', '}'],
			data: {
				exportableModels: @json($exportableModels),
				selectedModel: undefined,
				modelFilterProperty: undefined,
			},

			computed: {

				displayedModel: function(){
					return this.exportableModels[this.selectedModel];
				},

			},

			mounted: function(){
			},

			methods: {
				showAdvice: function (advice) {
					alert(advice)
				}
			}
})
	</script>
</body>

</html>