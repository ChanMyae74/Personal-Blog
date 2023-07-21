<x-layout>
    @section('title', 'User Update')
    <div class="sm:px-6 lg:pl-64 space-y-6">
        <div class="p-5 rounded space-y-3">
            <form method="POST" action="{{ route('users.update' ,$user) }}">
                @csrf
                @method('PATCH')
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name"
                                  required autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>

                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email"
                                  required autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
                <!-- Role Access -->
                <div class="mt-4">
                    <label for="role"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                    <select id="role"
                            name="role"
                            class="p-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-black/75 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option selected disabled>Choose A Role</option>
                        @foreach($roles as $role)
                            <option
                                value="{{$role->id}}" {{$role->name == $user->role ? 'selected' : ''}}>{{strtoupper($role->name)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
