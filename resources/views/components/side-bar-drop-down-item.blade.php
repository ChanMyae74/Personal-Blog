<li class="transition-colors my-1 px-2 dark:border-gray-700">
    <button type="button"
            class="flex w-full p-2 rounded hover:text-sky-500 hover:bg-gray-300 dark:hover:text-sky-500 dark:hover:bg-gray-700 text-black/50 dark:text-white duration-300 hover:text-sky-500 cursor-pointer text-xs font-normal justify-between align-center items-center stroke-gray-700 dark:stroke-gray-100"
            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
        <i class="text-green-400 {{ $class }}"></i>
        <span class="flex-1 ml-2 text-left whitespace-nowrap" sidebar-toggle-item>{{$name}}</span>
        <svg sidebar-toggle-item class="w-4 h-4" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul id="dropdown-example" class="{{ request()->url() != $link ? '' : 'hidden' }}">
        {{$slot}}
    </ul>
</li>
