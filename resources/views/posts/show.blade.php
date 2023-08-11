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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="antialiased text-black dark:text-white/50 bg-gray-100 dark:bg-gray-900">
<section class="">

    <x-home-nav/>

    <main class="md:max-w-7xl mx-auto mt-10 lg:mt-20 rounded-xl space-y-6 px-3 py-6">
        <article class="lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 w-full text-center md:pt-14 md:mb-10 px-0 lg:px-3">
                @if($post->photos->count())
                    <img src="{{asset('storage/PostAttachment/'.$post->photos[0]->unique_name)}}"
                         class="lazy object-cover h-80 mx-auto rounded-xl"
                         loading="lazy" alt="Blog Post illustration">
                @endif
                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{$post->created_at->diffForHumans()}}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="{{asset('images/Tech-Si Logo.png')}}" alt="" class=" w-8 h-8">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->name }}">
                                {{$post->author->name}}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="bg-blue-100 text-blue-800 text-xs font-medium px-1.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 inline-flex items-center">
                        <svg class="w-[12px] h-[12px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                        </svg>
                    </a>

                    <div class="space-x-2">
                        <x-category-botton :category="$post->category"/>
                    </div>
                </div>
                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{$post->title}}
                </h1>
                <div class="space-y-4 lg:text-lg leading-loose">
                    {{$post->body}}
                </div>

                <div class="mt-6">
                    @if($post->photos->count() === 1 )
                        <a class="my-link" href="{{asset('storage/PostAttachment/'.$post->photos[0]->unique_name)}}">
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                <div class="duration-700 ease-in-out">
                                    <img src="{{asset('storage/PostAttachment/'.$post->photos[0]->unique_name)}}"
                                         class="lazy object-cover rounded-xl "
                                         loading="lazy" alt="Blog Post illustration">
                                </div>
                            </div>
                        </a>
                    @else
                        <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                <div class="duration-700 ease-in-out">
                                    @foreach($post->photos->skip(1) as $photo)
                                        <a href="{{asset('storage/PostAttachment/'.$photo->unique_name)}}"
                                           data-maxwidth="100%"
                                           class="my-link" data-gall="myGallery">
                                            <img src="{{asset('storage/PostAttachment/'.$photo->unique_name)}}"
                                                 class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 object-cover rounded-xl"
                                                 data-gall="attachment-gallery" loading="lazy"
                                                 alt="Blog Post illustration" data-carousel-item>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex justify-center items-center pt-4">
                                <button type="button"
                                        class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none"
                                        data-carousel-prev>
                                <span
                                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1"
                                              d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                                </button>
                                <button type="button"
                                        class="flex justify-center items-center h-full cursor-pointer group focus:outline-none"
                                        data-carousel-next>
                                <span
                                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1"
                                              d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </article>
    </main>

    <x-footer></x-footer>
</section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</html>
