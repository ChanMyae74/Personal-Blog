@php
    $active = "text-sky-500 bg-gray-300 dark:text-sky-500 dark:bg-gray-800";
@endphp
{{--@dd($id)--}}
<li for="{{$id}}"
    class="transition-colors mt-3 px-2">
    <a id="{{$id}}" href="{{ $link }}"
       class="sidebar-link flex p-2 rounded items-center text-black/50 dark:text-white hover:text-sky-500 hover:bg-gray-300 text-xs duration-300 font-normal group dark:hover:text-sky-500 dark:hover:bg-gray-700 {{ request()->url() == $link ? $active : '' }}">
        <i class="text-green-400 mr-2 {{ $class }}"></i>
        {{ $name }}
        @isset($count)
            <span
                class="absolute mr-2 absolute right-2 font-xs text-xs rounded-full text-sky-600 bg-red-200 dark:bg-red-500/10 px-2 py-0.5 dark:text-red-400">{{$count}}
            </span>
        @endisset
    </a>
</li>
