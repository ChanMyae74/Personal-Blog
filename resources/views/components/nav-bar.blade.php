<header class="sticky top-0 z-40 flex-none mx-auto w-full bg-white dark:bg-gray-800 ">

    <nav
        class="px-4 border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800 lg:px-6 py-2.5">
        <div class="flex flex-col md:flex-row flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <div class="">
                <a href="/"
                   class="ml-2 m-0 duration-300 inline-flex rounded-xl font-semibold dark:text-white py-2 px-3 hover:bg-gray-200 dark:hover:bg-slate-900">
                   <img src="{{ asset('images/Tech-Si Logo.png') }}" alt="" class="w-8 mr-3">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white uppercase">Tech-Si</span>
                </a>
            </div>
            <div class="md:items-center flex mt-3 md:mt-0">
                @auth
                    <div class="hidden sm:md:block relative">
                        <img class="w-10 h-10 rounded-full mr-2"
                             src="{{asset('images/lary-avatar.svg')}}" alt="">
                    </div>
                    <x-master_a_button :link="route('dashboard')" :target="null" :icon="'bi bi-sliders2'">
                        WELCOME ,
                        <span
                            class="text-mx font-bold uppercase text-gray-800 dark:text-blue-500">{{auth()->user()->name}}</span>
                    </x-master_a_button>
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <x-master_a_button :link="route('logout')" :icon="'bi bi-box-arrow-in-left'" :onclick="'event.preventDefault();this.closest(`form`).submit();'"  :type="'submit'">
                            LOGOUT
                        </x-master_a_button>
                    </form>
                @else
                    @if(Route::has('login'))
                        <x-master_a_button :link="'/login'"
                                           :icon="'bi bi-box-arrow-in-right'">
                            LOGIN
                        </x-master_a_button>
                        @if (Route::has('register'))
                            <x-master_a_button :link="route('register')"
                                               :icon="'bi bi-box-arrow-in-right'">
                                LOGIN
                            </x-master_a_button>
                        @endif
                    @endif
                @endauth
                <button id="theme-toggle" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>
