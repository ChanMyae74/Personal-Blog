<x-layout>
    @section('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-3 sm:px-6 lg:pl-64 space-y-6">
        <div class="mx-auto px-5">
            <div class="bg-gray-100 dark:bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between">
                    <a href="{{route('users.index')}}">
                        <div class="flex justify-center items-center max-w-[500px] p-6 px-[65px] bg-white border border-gray-200 rounded-lg  shadow
                     hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <div class="border-2 rounded-full w-[70px] h-[70px] flex justify-center items-center mr-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$user}}</h5>
                            <h5 class="mb-2 inline-block text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Users</h5>
                        </div>
                    </div>
                    </a>
                    <a href="{{route('category.index')}}">
                        <div class="flex justify-center items-center max-w-[500px] p-6 px-[60px] bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100
                    dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <div class="border-2 rounded-full w-[70px] h-[70px] flex justify-center items-center mr-6">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="50" height="50" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                                <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z"/>
                                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$category}}</h5>
                            <h5 class="mb-2 inline-block text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Categories</h5>
                        </div>
                    </div>
                    </a>
                    <a href="{{ route('post.index') }}">
                        <div class="flex justify-center items-center max-w-[500px] p-6 px-[60px] bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100
                    dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <div class="border-2 rounded-full w-[70px] h-[70px] flex justify-center items-center mr-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
                                <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z"/>
                                <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post}}</h5>
                            <h5 class="mb-2 inline-block text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Posts</h5>
                        </div>
                    </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layout>
