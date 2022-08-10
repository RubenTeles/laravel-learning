@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">

		<div @click=" show = ! show ">
			{{ $trigger }}
		</div>

	<div x-show="show" class="py-2 absolute bg-gray-100 rounded-xl w-full mt-0.5 z-10 overflow-auto max-h-52" style="display: none">

		{{ $slot }}
	</div>
</div>
