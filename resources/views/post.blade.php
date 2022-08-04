<x-layout>
    <x-slot name="content">
        <article>
            <h1>{!! $post->title !!}</h1>
            <div>
                {!! $post->body !!}
            </div>
        </article>

        <p>
            <a href='/categories/{{ $post->category->slug }}'>{{ $post->category->name }}</a>
        </p>

        <a href="/">Go Back</a>

        <x-button>
            <x-slot name="name">
                test button
            </x-slot>
        </x-button>
        
    </x-slot>

    <x-slot name="title">
        My Post
    </x-slot>
</x-layout>