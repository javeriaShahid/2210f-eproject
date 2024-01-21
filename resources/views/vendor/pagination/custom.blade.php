<nav class="shop-pagination">
    <ul class="pagination-list">
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="shop-pagi-btn" aria-hidden="true">&laquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="shop-pagi-btn" aria-label="@lang('pagination.previous')">&laquo;</a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="shop-pagi-btn">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="shop-pagi-btn" aria-label="@lang('pagination.next')">&raquo;</a></li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="shop-pagi-btn" aria-hidden="true">&raquo;</span>
            </li>
        @endif
    </ul>
</nav>
