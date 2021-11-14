@auth
    <x-panel>
        <form method="POST" action="/products/{{ $product->slug }}/comment">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                     alt=""
                     width="40"
                     height="40"
                     class="rounded-full">

                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6 form-control">
                <textarea
                    name="body"
                    class="w-full h-24 text-sm focus:outline-none textarea textarea-bordered"
                    rows="5"
                    placeholder="Quick, thing of something to say!"
                    required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end pt-6 mt-6 border-t border-gray-200">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="text-blue-400 hover:underline">Register</a> or
        <a href="/login" class="text-blue-400 hover:underline">log in</a> to leave a comment.
    </p>
@endauth