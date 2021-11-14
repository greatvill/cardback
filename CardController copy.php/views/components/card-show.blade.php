<div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center">
	<div class="absolute bg-black opacity-60 inset-0 z-0"></div>
	<div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
	<div class="grid  gap-8 grid-cols-1">
	<div class="flex flex-col ">
			<div class="flex flex-col sm:flex-row items-center">
				<h2 class="font-semibold text-lg mr-auto">Визитка +</h2>
				<a href="/cards/download/{{$card->id}}">Скачать</a>
				<div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
			</div>
			<div class="mt-5">
				<form method="post" action="update/{{$card->id}}" class="form">
					@csrf
					<div class="md:space-y-2 mb-3">
						<label class="text-xs font-semibold text-gray-600 py-2">Фото<abbr class="hidden"></abbr></label>
						<div class="flex items-center py-6">
							<div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
								<img class="w-12 h-12 mr-4 object-cover" src="https://images.unsplash.com/photo-1611867967135-0faab97d1530?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1352&amp;q=80" alt="Avatar Upload">
				</div>
								<label class="cursor-pointer ">
				  <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Выбрать файл</span>
				  <input value="{{$card->data['photo'] ?? ''}}" name="photo" type="file" class="hidden" :multiple="multiple" :accept="accept">
				</label>
							</div>
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Фамилия<abbr title="required">*</abbr></label>
								<input value="{{$card->data['lastname'] ?? ''}}" placeholder="Фамилия" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="lastname" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Имя<abbr title="required">*</abbr></label>
								<input  value="{{$card->data['name'] ?? ''}}"placeholder="Имя" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="name" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Название компании</label>
								<input value="{{$card->data['company'] ?? ''}}" placeholder="Название компании" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="company" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Должность</label>
								<input value="{{$card->data['jobTitle'] ?? ''}}"" placeholder="Должность" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="jobTitle" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Электронная почта</label>
								<input value="{{$card->data['email'] ?? ''}}" placeholder="Электронная почта" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="email" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Номер телефона</label>
								<input value="{{$card->data['phone'] ?? ''}}" placeholder="Номер телефона" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="phone" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Название адреса</label>
								<input value="{{$card->data['addressName'] ?? ''}}" placeholder="Название адреса" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="addressName" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Дополнительное название</label>
								<input value="{{$card->data['addressExtended'] ?? ''}}" placeholder="Название адреса дополнительно" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="addressExtended" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Страна</label>
								<input value="{{$card->data['country'] ?? ''}}" placeholder="Страна" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="country" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Город</label>
								<input value="{{$card->data['city'] ?? ''}}" placeholder="Город" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="city" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Регион</label>
								<input value="{{$card->data['region'] ?? ''}}" placeholder="Регион" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="region" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Улица</label>
								<input value="{{$card->data['street'] ?? ''}}" placeholder="Улица" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="street" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">	
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Почтовый индекс</label>
								<input value="{{$card->data['zip'] ?? ''}}" placeholder="Почтовый индекс" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="zip" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
						</div>
						
						<div class="mb-3 space-y-2 w-full text-xs">
							<label class=" font-semibold text-gray-600 py-2">Сайт</label>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Название</label>
								<input value="{{$card->data['url'] ? $card->data['url']->type : ''}}" placeholder="Название" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="url[type]" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Ссылка</label>
								<input value="{{$card->data['url'] ? $card->data['url']->value : ''}}" placeholder="Ссылка" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="url[value]" id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							
							</div>
							
								<p class="text-xs text-red-500 text-right my-3">Обязательные поля помечены звёздочкой <abbr title="Required field">*</abbr></p>
								<div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
									<button class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"> Отменить </button>
									<button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Обновить</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>