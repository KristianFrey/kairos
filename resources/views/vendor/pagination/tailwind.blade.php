@if ($paginator->hasPages())
    <nav class="flex justify-center mt-6">
        <ul
            class="inline-flex items-center rounded-xl 
               bg-white shadow-sm border border-gray-200 
               overflow-hidden text-sm">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="px-4 h-10 flex items-center text-gray-400 cursor-not-allowed">
                    Anterior
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-4 h-10 flex items-center text-gray-600 hover:bg-gray-100 transition">
                        Anterior
                    </a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-4 h-10 flex items-center text-gray-400">
                        {{ $element }}
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span
                                    class="w-10 h-10 flex items-center justify-center 
                                         bg-blue-600 text-white font-medium">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="w-10 h-10 flex items-center justify-center 
                                      text-gray-600 hover:bg-gray-100 transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-4 h-10 flex items-center text-gray-600 hover:bg-gray-100 transition">
                        Próximo
                    </a>
                </li>
            @else
                <li class="px-4 h-10 flex items-center text-gray-400 cursor-not-allowed">
                    Próximo
                </li>
            @endif

        </ul>
    </nav>
@endif
