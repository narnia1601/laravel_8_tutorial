<x-layout>
    <x-post-header :mainCategory="$mainCategory"></x-post-header>
    @if (count($posts) > 0)
        <x-featured-post-card :post="$posts[0]"></x-featured-post-card>
        <div class="lg:grid lg:grid-cols-6">
            @foreach ($posts->skip(1) as $post)
                <x-post-card :post="$post" class="{{ $loop->iteration > 2 ? 'col-span-2' : 'col-span-3' }}"></x-post-card>
            @endforeach
        </div>
        {{ $posts->links() }}
    @else
        <p class="text-center">No posts found. Please try again.</p>
    @endif
</x-layout>