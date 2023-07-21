@props(['comment'])

<article class="flex bg-gray-100 border border-black border-opacity-5 rounded-xl p-6 space-x-4">
    <div class="flex-shrink-0">
        <img src="/images/lary-avatar.svg" alt="Avatar" width="60" height="60" class="rounded-xl">
    </div>
    
    <div>
        <header>
            <h3 class="font-bold">
                {{ $comment->author->username }}
            </h3>
            <p class="text-xs">
                Posted <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>
        
        <p class="mt-4 text-sm">
            {{ $comment->body }}
        </p>
    </div>
</article>