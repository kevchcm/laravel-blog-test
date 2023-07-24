@props(['heading'])

<section class="max-w-4xl mx-auto mt-16">
    <h1 class="text-lg font-bold mb-4 uppercase">
        {{ $heading }}
    </h1>
    <hr class="my-6">
    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">
                Links
            </h4>
            <ul>
                <li>
                    <a href="{{ route('post-create') }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('post-create') }}" class="{{ request()->routeIs('post-create') ? 'text-blue-500' : '' }}">
                        New Post
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-post-show') }}" class="{{ request()->routeIs('admin-post-show') ? 'text-blue-500' : '' }}">
                        All Posts
                    </a>
                </li>
            </ul>
        </aside>
    
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</section>