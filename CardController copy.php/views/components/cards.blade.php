<section class="container px-6 py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class="grid gap-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
	<!-- Card 1 -->
	@if($cards->count() > 0)
		@foreach($cards as $card)
		
			<div class="flex items-center p-4 bg-white border-2 border-gray-200 rounded-lg shadow-sm dark:bg-gray-800">
			  <div class="p-3 mr-4 bg-blue-500 text-white rounded-full">
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path></svg>
			  </div>
			  <a href="/cards/edit/{{$card->id}}">
			  <div>
				<p class="mb-2 text-sm font-medium text-gray-900">{{$card->data['name']}}</p>
				<p class="text-sm font-normal text-gray-800">{{$card->data['lastname']}}</p>
			  </div>
			  </a>
			  <a href="/cards/{{$card->id}}">
			  
					<div>
					  <p class="mb-2 text-sm font-medium text-gray-900">Просмотреть</p>
					</div>
			  </a>
			</div>
			
		@endforeach
		<div class="flex items-center p-4 bg-white border-2 border-gray-200 rounded-lg shadow-sm dark:bg-gray-800">
			  <div>
				<a href="/cards/create" class="text-sm font-normal text-gray-800">Добавить новую визитку</a>
			  </div>
			</div>
	@else
		<div class="flex items-center p-4 bg-white border-2 border-gray-200 rounded-lg shadow-sm dark:bg-gray-800">
		  <div>
			<p class="mb-2 text-sm font-medium text-gray-900">Пока нет ни одной визитки</p>
			<a href="/cards/create" class="text-sm font-normal text-gray-800">Добавить новую визитку</a>
		  </div>
		</div>
	@endif
  </div>
</section>