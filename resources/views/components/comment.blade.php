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
                <div class="flex items-end gap-3">
                    <div class="flex items-end gap-1">
                        <span>2</span>
                        <a href="">
                            <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#00ff00"
                                    d="m20 8h-5.612l1.123-3.367c.202-.608.1-1.282-.275-1.802s-.983-.831-1.624-.831h-1.612c-.297 0-.578.132-.769.36l-4.7 5.64h-2.531c-1.103 0-2 .897-2 2v9c0 1.103.897 2 2 2h3 10.307c.829 0 1.581-.521 1.873-1.298l2.757-7.351c.042-.112.063-.231.063-.351v-2c0-1.103-.897-2-2-2zm-16 2h2v9h-2zm16 1.819-2.693 7.181h-9.307v-9.638l4.468-5.362h1.146l-1.562 4.683c-.103.305-.051.64.137.901.188.262.49.416.811.416h7z" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-end gap-1">
                        <span>2</span>
                        <a href="">
                            <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#ff0000"
                                d="m20 3h-3-10.307c-.829 0-1.581.521-1.873 1.298l-2.757 7.351c-.042.112-.063.231-.063.351v2c0 1.103.897 2 2 2h5.612l-1.122 3.367c-.203.608-.101 1.282.274 1.802.376.52.982.831 1.624.831h1.612c.297 0 .578-.132.769-.36l4.7-5.64h2.531c1.103 0 2-.897 2-2v-9c0-1.103-.897-2-2-2zm-8.469 17h-1.145l1.562-4.684c.103-.305.051-.64-.137-.901s-.49-.415-.811-.415h-7v-1.819l2.693-7.181h9.307v9.638zm6.469-6v-9h2l.001 9z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</x-panel>
