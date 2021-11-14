<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user->id }}" alt="" width="60" height="60"
                class="rounded-xl">
        </div>

        <div class="w-full">
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->user->name }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>

            <div class="flex justify-between">
                <div>
                    <p>
                        {{ $comment->body }}
                    </p>
                </div>
                <livewire:comments.like :comment="$comment" />
            </div>
        </div>
    </article>
</x-panel>
