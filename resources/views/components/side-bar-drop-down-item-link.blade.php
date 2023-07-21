@php
    $active = "text-sky-500 bg-gray-300 dark:text-sky-500 dark:bg-gray-800";
@endphp
<li class="transition-colors my-1 px-2">
    <a href="{{$link}}"
       class="sidebar-dropdown-link flex p-2 rounded items-center text-black/50 dark:text-white hover:text-sky-500 hover:bg-gray-300 text-xs duration-300 font-normal group dark:hover:text-sky-500 dark:hover:bg-gray-700 {{ request()->url() == $link ? $active : '' }}">
        <i class="text-green-400 mr-2 {{ $class }}"></i>
        {{$name}}
    </a>
</li>

