@props(['name', 'label', 'type', 'holder', 'require'])

<label for="{{$name}}"
       class="block uppercase text-xs font-regular text-black-50 text-gray-500 dark:text-white/75">
    {{$label}}
    @if($require)
    <span
        class="absolute ml-1 w-1 h-1 bg-red-500 rounded-full shadow"></span>
    @endif
    <input type="{{$type}}" value="" name="{{$name}}"
           id="{{$name}}" autocomplete="{{$name}}"
           placeholder="{{$holder}}"
           class="mt-1 block w-full text-black dark:text-white/50 dark:bg-gray-800 rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-xs">
    @error($name)
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
</label>
