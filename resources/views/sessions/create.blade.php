<x-layout>
    @include('posts._header')
    <section class="px-6 py-8">
        <main class="max-w-md mx-auto mt-10 bg-slate-900 border border-slate-900 p-6 rounded-xl">
            <h1 class="font-bold text-center text-xl text-white">AUTHORIZATION LOGIN</h1>
            <form method="POST" action="{{route('login')}}" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-white" for="email">
                        Email
                        <span class="text-red-400">•</span>
                    </label>
                    <input class="border rounded border-gray-400 p-2 w-full text-black"
                           type="text"
                           name="email"
                           id="email"
                           value="{{old('email')}}"
                           required
                    >
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-white" for="password">
                        Password
                        <span class="text-red-400">•</span>
                    </label>
                    <input class="border rounded border-gray-400 p-2 w-full text-black"
                           type="password"
                           name="password"
                           id="password"
                           required
                    >
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit"
                            class="bg-slate-800 duration-300 text-white w-full rounded py-2 px-4 hover:bg-slate-600" for="password">
                        LOGIN
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
