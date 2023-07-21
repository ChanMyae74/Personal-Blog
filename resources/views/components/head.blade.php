<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME', 'Tech-Si')}} - Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600;700&display=swap" rel="stylesheet">
</head>
<body class="antialiased text-black dark:text-white/50 bg-[#F0F2F5] dark:bg-gray-900">
<section class="">
    <x-home-nav/>
    <header class="max-w-4xl mx-auto mt-20 text-center">
        <div class="max-w-xl mx-auto">
            <h1 class="text-2xl md:text-4xl ">Latest <span class="text-blue-500">Tech-Si</span> Article New.</h1>
            <h2 class="inline-flex mt-2 font-semibold">By Tech-Si <img src="{{asset('images/lary-head.svg')}}" alt="">
            </h2>
        </div>
        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
            <!--  Category -->
            <span class="relative inline-flex items-center rounded-xl">
                <x-category-drop-down-item/>
                </span>
            <!-- Other Filters -->
            <!-- Search -->
            <span class="relative inline-flex items-center rounded-xl">
                    <form method="GET" action="/">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{request('category')}}">
                        @endif
                        <label>
                            <input type="text" name="search" placeholder="Find something" value="{{request('search')}}"
                                   class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white/50 rounded border placeholder-black dark:placeholder-white/50 font-semibold text-sm">
                        </label>
                    </form>
                </span>
        </div>
    </header>
    <section class="max-w-7xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts"/>
            {{$posts->links()}}
        @else
            <p class="text-center uppercase bg-slate-900 ml-2 m-0 rounded text-xs font-semibold text-white py-2 px-3 hover:bg-slate-800">
                No posts yet. Please check back later.</p>
        @endif
    </section>
    <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{date('Y')}} <a
              href="/" class="hover:underline">Tech-Si</a>. All Rights Reserved.
    </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>
</section>
</body>
</html>
