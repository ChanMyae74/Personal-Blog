@auth()
    <x-pane>
        <form method="POST" action="/posts/{{$post->slug}}/comments" class="">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100/?u={{auth()->id()}}}" alt="" width="40" height="40"
                     class="rounded-full">
                <h3 class="ml-4">Want to participate?</h3>
            </header>
            <div class="mt-6">
                            <textarea name="comment"
                                      class="w-full border border-gray-200 text-sm focus:outline-none focus:ring"
                                      id="comment"
                                      rows="5"
                                      placeholder="Aa"
                            ></textarea>

                @error('comment')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end">
                <x-submit-button>POST</x-submit-button>
            </div>
        </form>
    </x-pane>
@else

    <p class="text-xs rounded-xl inline-block bg-slate-900 px-3 py-3 uppercase">

        <a class="text-blue-500 hover:underline" href="{{ route('register') }}">REGISTER</a> or <a
            class="text-blue-500 hover:underline" href="{{ route('login') }}">LOGIN</a> to a leave
        comments.

    </p>

@endauth
