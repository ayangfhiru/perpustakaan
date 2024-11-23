<div class="{{ $class ?? 'col-span-full' }}">
    <label for="{{ $name }}" class="block text-sm/6 font-medium text-gray-900">{{ $title }}</label>
    <div class="mt-2">
        <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ $value ?? old($name) }}"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
    </div>
</div>
