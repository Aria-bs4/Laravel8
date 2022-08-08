<x-layout>
    @include ('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-grid :posts="$posts" />
        @else
            <p class="text-center">There is no post yet. Try again later</p>
        @endif
    </main>
</x-layout>
