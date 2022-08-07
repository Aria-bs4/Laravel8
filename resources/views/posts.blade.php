
<x-layout>
    <x-slot name="content">
        @foreach($posts as $post)
        <article class="{{ $loop->even ? 'foobar' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            <p>
                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href='/categories/{{ $post->category->slug }}'>{{ $post->category->name }}</a>
            </p>

            <div>{{ $post->excerpt }}</div>
        </article>
        @endforeach
    </x-slot>

    <x-slot name="title">
        My Blog
    </x-slot>

</x-layout>
