@props(['comment'])
<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60" alt="" class="rounded-xl">
    </div>
    <div>
        <header>
            <h3 class="font-bold">{{ $comment->user->name }}</h3>
            <p class="text-sm">Posted {{ $comment->created_at->diffForHumans() }}</p>
        </header>
        <p>{{ $comment->body }}</p>
    </div>
</article>