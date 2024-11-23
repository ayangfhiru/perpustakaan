<a href="{{ $link }}"
    class="{{ $isUpdate ?? 'text-red-600 hover:text-red-800 focus:text-red-800 dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400' }} text-blue-600 hover:text-blue-800 focus:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent focus:outline-none  disabled:opacity-50 disabled:pointer-events-none">
    {{ $slot }}
</a>
