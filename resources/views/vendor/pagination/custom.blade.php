@if ($paginator->hasPages())

    <nav class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <button class="pagination__button prev" aria-disabled="true" aria-label="@lang('pagination.previous')"></button>
            @else
            <a class="pagination__button prev" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"></a>
            @endif

            <div class="pagination__pages">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                                <div class="pagination__link active">
                                    <div class="pagination__line"></div>
                                    <span class="pagination__number">{{ $page }}</span>
                                </div>
                        @else
                                <a href="{{ $url }}" class="pagination__link">
                                    <div class="pagination__line"></div>
                                    <span class="pagination__number">{{ $page }}</span>
                                </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            </div>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <a class="pagination__button next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"></a>
            @else
            <button class="pagination__button next" aria-disabled="true" aria-label="@lang('pagination.next')"></button>
            @endif
    </nav>
@endif
