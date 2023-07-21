<x-layout>
    @section('title', 'User Manage')
    <div class="sm:px-6 lg:pl-64 space-y-6">
        <div class="p-5 rounded space-y-3">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                <a href="{{route('users.create')}}"
                   class="inline-block text-xs bg-slate-700 hover:bg-slate-900 dark:bg-slate-900  mr-1 sm:md:mr-2 m-0 duration-300 rounded-xl text-xs font-semibold text-white/50 hover:text-white py-2 px-3 dark:hover:bg-slate-700">
                    <i class="text-green-500 bi bi-book mr-2"></i>
                    Add User
                </a>
            </div>
            @if($users->count())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Control
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$user->id}}
                                    </th>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                        {{$user->name}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                         <span
                                             class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                             {{$user->email}}
                                         </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">
                                            {{strtoupper($user->role)}}
                                         </span>

                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('users.edit',$user)}}"
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
                        No posts yet. Please check back later.</p>
                </div>
            @endif
        </div>
    </div>
</x-layout>
