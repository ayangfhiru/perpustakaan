@if ($paginator->hasPages())
    <div class="flex justify-between items-center px-4 py-3">
        <div class="text-sm text-slate-500">
            Showing <b>{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}</b> of {{ $paginator->total() }}
        </div>
        <div class="flex space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button
                    class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease cursor-not-allowed"
                    aria-label="@lang('pagination.previous')" disabled>
                    Prev
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="flex justify-center items-center px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease"
                    aria-label="@lang('pagination.previous')">
                    Prev
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button
                        class="flex items-center justify-center px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-gray-700 bg-gray-300 border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                        {{ $element }}
                    </button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button
                                class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-gray-200 bg-gray-700 border border-slate-200 rounded cursor-not-allowed"
                                disabled>
                                {{ $page }}
                            </button>
                        @else
                            <a href="{{ $url }}"
                                class="flex items-center justify-center px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-gray-700 bg-gray-300 border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach


            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="flex items-center justify-center px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                    Next
                </a>
            @else
                <button
                    class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease cursor-not-allowed"
                    aria-label="@lang('pagination.previous')" disabled>
                    Next
                </button>
            @endif
        </div>
    </div>
@endif
