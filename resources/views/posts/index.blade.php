<x-layout>
	@include('posts._header')

	<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
		@if($posts->count())
			<x-post-grid :posts="$posts"></x-post-grid>

			{{ $posts->links() }}
		@else
			<p class="text-center">No Posts Yet. Please check back later.</p>
		@endif
	</main>

	{{--         <article>--}}
	{{--         <h2>Add New Post:</h2>--}}

	{{--         <form method="POST" action="/">--}}
	{{--             {{ csrf_field() }}--}}
	{{--             <input type="text" name="title" placeholder="title" required><br>--}}
	{{--             <input type="text" name="body" placeholder="body" required>--}}
	{{--             <button type="submit">Submit</button>--}}
	{{--         </form>--}}
	{{--         </article>--}}
	{{--         <br><br><br><br>--}}
</x-layout>
