<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Посмотреть Визитку +') }}
		</h2>
	</x-slot>
		   
	<x-card-show :card="$card" />
		
</x-app-layout>
