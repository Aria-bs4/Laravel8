
<x-layout>
    <x-slot name="content">
        @foreach($posts as $post)
        <article class="{{ $loop->even ? 'foobar' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            <div>{{ $post->excerpt }}</div>
        </article>
        @endforeach
    </x-slot>

    <x-slot name="title">
        My Blog
    </x-slot>

</x-layout>