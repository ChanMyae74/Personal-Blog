@props(['link' => null,'target' => null,'icon' => null, 'type' => null, 'onclick' => null])
<a href="{{$link}}"
   target="{{$target}}"
   type="{{$type}}"
   onclick="{{$onclick}}"
   class="block text-xs bg-blue-500 hover:bg-blue-700 dark:bg-slate-900 dark:hover:bg-slate-700 mr-1 sm:md:mr-2 m-0 duration-300 rounded-xl font-semibold text-white hover:text-white p-3">
    <i class="text-white {{$icon}}"></i>
    {{$slot}}
</a>
