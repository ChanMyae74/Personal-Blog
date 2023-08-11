@props(['post'])
<article
    class="transition-colors duration-300 bg-white dark:bg-gray-800 dark:hover:bg-gray-700 border border-gray-300 border-opacity-50 hover:border-opacity-100 rounded-xl
     md:mx-0 mr-0 md:mr-3">
    <div class="p-6 lg:flex">
        <div class="flex-1 lg:mr-8" style="width:80%">
            @if($post->photos->count())
                <img src="{{asset('storage/PostAttachment/'.$post->photos[0]->unique_name)}}"
                     class="lazy object-cover w-full h-80 rounded-xl"
                     loading="lazy" alt="Blog Post illustration">
            @endif
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-botton :category="$post->category"/>

                </div>
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="{{route('post.show',$post)}}">
                            {{$post->title}}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                     Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{$post->excerpt}}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{asset('images/Tech-Si Logo.png')}}" alt="" class=" w-8 h-8">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->name }}">
                                {{$post->author->name}}
                            </a>
                        </h5>
                    </div>
                </div>

                <div class=" md:block">
                    <x-master_a_button :link="route('post.show',$post)"
                       class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2"
                    >Read More</x-master_a_button>
                </div>
            </footer>
        </div>
    </div>
</article>
