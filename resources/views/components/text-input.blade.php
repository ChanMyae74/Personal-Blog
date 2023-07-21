@props(['disabled' => false])

<label>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-black/75 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
</label>
