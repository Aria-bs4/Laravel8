@props(['comment'])

<article class="bg-gray-100 border border-gray-200 flex p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src='https://i.pravatar.cc/60?u={{ $comment->id }}' with="60" height="60" class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <h3>{{ $comment->author->username }}</h3>
            <p class="text-xs">
                posted
                <time>{{ $comment->created_at }}</time>
            </p>
        </header>
        {{ $comment->body }}
    </div>
</article>