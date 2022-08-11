@auth
	<x-panel>
		<form method="POST" action="/posts/{{ $post->slug }}/comments">
			@csrf
			<header class="flex items-center">
				@if($image = auth()->user()->image)
					<img src="{{ url("storage/{$image}") }}" alt="" width="60" height="60" class="rounded-xl">
				@else
					<img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
				@endif
				<h3 class="font-bold ml-4">{{ auth()->user()->name }}</h3>
			</header>

			<div class="mt-3">
				<h2 class="ml-2">Want to participate?</h2>
				<textarea
					name="body" class="mt-2 w-full text-sm focus:outline-none focus:ring rounded-xl p-2 bg-gray-100 hover:bg-gray-200"
					rows="5"
					placeholder="Write your Comment!"
					required></textarea>

				@error('body')
				<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>
			{{--SUBMIT-BUTTON--}}
			<div class="flex justify-end mt-2">
				<x-submit-button>Post</x-submit-button>
			</div>

		</form>
	</x-panel>
@else
	<x-panel class="bg-gray-50 hover:bg-gray-200">
		<p class="font-semibold">
			<a href="/register" class="hover:underline hover:text-blue-500">Register</a> or
			<a href="/login" class="hover:underline hover:text-blue-500">log in</a> to leave a comment!
		</p>
	</x-panel>
@endauth
