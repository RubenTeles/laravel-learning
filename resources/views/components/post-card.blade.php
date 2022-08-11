@props(['post'])

<article
	{{ $attributes->merge(['class' => "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl" ]) }}>
	<div class="py-6 px-5">
		<div>
			<a href="/posts/{{ $post->slug }} ">
				<img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">
			</a>
		</div>

		<div class="mt-8 flex flex-col justify-between">
			<header>
				<div class="space-x-2">
					<x-category-button :category="$post->category"></x-category-button>
				</div>

				<div class="mt-4">
					<a href="/posts/{{ $post->slug }} ">
						<h1 class="text-3xl">
							{{ $post->title }}
						</h1>
					</a>
					<span class="mt-2 block text-gray-400 text-xs">
						Published <time>{{ $post->created_at->diffForHumans() }}</time>
					</span>
				</div>
			</header>

			<div class="text-sm mt-4 space-y-4">
				{!! $post->excerpt !!}
			</div>

			<footer class="flex justify-between items-center mt-8">
				<div class="flex items-center text-sm">
					@if($post->author->image)
						<img src="{{ url("storage/{$post->author->image}") }}" alt="" width="56" height="63" class="rounded-xl">
					@else
						<img src="/images/lary-avatar.svg" alt="Lary avatar">
					@endif
					<a href="?author={{ $post->author->username }}">
						<div class="ml-3">
							<h5 class="font-bold">{{ $post->author->name }}</h5>
						</div>
					</a>
				</div>

				<div>
					<a href="/posts/{{ $post->slug }} "
					class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
					>Read More</a>
				</div>
			</footer>
		</div>
	</div>
</article>
