<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laravel Model Export</title>
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js"></script>
</head>

<body>
	<form method="POST" action="{{route('laravel-model-export.download')}}">
		{{ csrf_field() }}
		<div id="laravel-model-export" class="p-24 hover:bg-grey-lightest">
			<div class="font-bold text-2xl ">
				Easily export Models from your database
			</div>

			<div class='my-10'>
				<h2 class="font-bold mt-4">Model</h2>
				<select class="w-64 p-2 border rounded" name="model" v-model="selectedModel">
					<option selected></option>
					<option v-for=" modelEntry , modelName  in exportableModels " :value="modelName">${modelName}</option>
				</select>
			</div>

			<div class='my-10'>
				<h2 class="font-bold mt-4">Filter Property:</h2>
				<select class="w-64 p-2 border rounded" name="filterProperty" v-model="modelFilterProperty">
					<option selected></option>
					<option v-for=" property in ( displayedModel ? Object.values( displayedModel ) : {} ) " :value="property">${property}</option>
				</select>
			</div>

			<div class='my-10'>
				<h2 class="font-bold mt-4">Lower Filter Range <span v-html="filteredPropertyHelper"></span></h2>
				<input class="w-64 p-2 border rounded" type="text" name="filterLower" id="">
			</div>

			<div class='my-10'>
				<h2 class="font-bold mt-4">Upper filter range <span v-html="filteredPropertyHelper"></span></h2>
				<input class="w-64 p-2 border rounded" type="text" name="filterUpper" id="">
			</div>

			<input class="rounded p-2 border bg-blue-400 px-5 my-5" type="submit" value="Submit">
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

				filteredPropertyHelper: function(){
					if(this.modelFilterProperty){
						return `for <span class="italic text-gray-600">${this.modelFilterProperty}</span>`;
					}
				}

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