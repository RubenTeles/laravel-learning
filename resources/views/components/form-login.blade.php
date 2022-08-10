<form method="Post" action="/sessions" class="mt-10">
	@csrf

	{{--EMAIL--}}
	<div class="mb-6">
		<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
			   for="email"
		>
			Email
		</label>
		<input class="border border-gray-400 p-2 w-full"
			   type="email"
			   name="email"
			   id="email"
			   value="{{ old('email') }}"
			   required
		>
		@error('email')
			<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
		@enderror
	</div>

	{{--PASSWORD--}}
	<div class="mb-6">
		<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
			   for="password"
		>
			Password
		</label>
		<input class="border border-gray-400 p-2 w-full"
			   type="password"
			   name="password"
			   id="password"
			   required
		>
		@error('password')
			<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
		@enderror
	</div>

	{{--SUBMIT-BUTTON--}}
	<div class="mb-6 text-center">
		<button type="submit"
				class="bg-gray-500 text-white rounded py-2 px-4 hover:bg-blue-500">
			Login
		</button>
	</div>

</form>
