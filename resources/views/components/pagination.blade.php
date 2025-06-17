@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-6">

        {{-- Full Pagination (visible on medium and larger screens) --}}
        <ul class="hidden md:inline-flex items-center space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-1 text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                        &laquo;
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-1 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                        &laquo;
                    </a>
                </li>
            @endif

            {{-- Page Number Links --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-3 py-1 text-gray-500">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-1 text-white bg-blue-600 border border-blue-600 rounded-md font-semibold">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-1 text-blue-600 bg-white border border-blue-300 rounded-md hover:bg-blue-100">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-1 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                        &raquo;
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-1 text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                        &raquo;
                    </span>
                </li>
            @endif
        </ul>

        {{-- Mobile Pagination (visible on small screens only) --}}
        <ul class="flex md:hidden items-center space-x-4">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                        Previous
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                        Previous
                    </a>
                </li>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                        Next
                    </a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                        Next
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
