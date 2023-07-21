<x-layout>
    @section('title', 'Posts')
    <div class="sm:px-6 lg:pl-64 space-y-6">
        <div class="p-5 rounded">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-5 md:col-span-2 p-1 md:mt-0">
                    <form action="{{route('post.store')}}" method="post" class=""
                          enctype="multipart/form-data">
                        @csrf
                        <div class="sm:overflow-hidden">
                            <div class="bg-white dark:bg-gray-800">
                                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-3">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-3">
                                            <label for="title"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                                Title</label>
                                            <input id="title"
                                                   name="title"
                                                   class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                   placeholder="Write your title here..."></input>
                                            @error('title')
                                            <p class="text-red-700 text-sm mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-3">
                                            <label for="category"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                            <select id="category"
                                                    name="category"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected disabled>Choose a category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <p class="text-red-700 text-sm mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="">
                                        <label for="description"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                            Description</label>
                                        <input id="description"
                                               name="description"
                                               class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="Write your description here..."></input>
                                        @error('description')
                                        <p class="text-red-700 text-sm mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <label for="body"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                                        <textarea id="body" rows="4" name="body"
                                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                  placeholder="Write your body here..."></textarea>
                                        @error('body')
                                        <p class="text-red-700 text-sm mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                               for="multiple_files">Upload multiple files</label>
                                        <input name="attachment[]"
                                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                               id="multiple_files" type="file" multiple>

                                    </div>
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
