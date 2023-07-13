<x-layout>
    @include('posts.header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts"/>
            
            {{--$items->links('pagination::bootstrap-4')--}}
            {{ $posts->links('pagination::tailwind') }}
        @else
            <p>
                No posts yet. Please check back later.
            </p>
        @endif
    </main>
</x-layout>