<x-layout>
    @section('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-3 sm:px-6 lg:pl-64 space-y-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                   @if(!auth()->user()->isEditor())
                        <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                            <form action="{{route('category.store')}}" method="post">
                                @csrf
                                <div class="col-span-3 mb-3">
                                    <label for="title"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                        Title</label>
                                    <input id="title"
                                           name="title"
                                           class="block p-1.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="Write your title here...">
                                    @error('title')
                                    <p class="text-red-700 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button
                                    class="inline-block bg-slate-700 hover:bg-slate-900 dark:bg-slate-900  mr-1 sm:md:mr-2 m-0 duration-300 rounded-xl text-xs font-semibold text-white/50 hover:text-white py-2 px-3 dark:hover:bg-slate-700">
                                    <i class="text-green-500 bi bi-book mr-2"></i>
                                    Add Category
                                </button>
                            </form>
                        </div>
                   @endif
                    @if($categories->count())
                        <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Author
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Control
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$category->id}}
                                            </th>
                                            <td class="px-6 py-4">
                                                <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300"> {{$category->title}}</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$category->author->name}}</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{route('category.edit',$category)}}"
                                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    @else
                        <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                            <p class="text-center uppercase bg-slate-900 ml-2 m-0 rounded-xl text-xs font-semibold text-white py-2 px-3 hover:bg-slate-800">
                                No categories yet. Please check back later.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
