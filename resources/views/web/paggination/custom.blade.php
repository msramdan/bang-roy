@if ($paginator->hasPages())
    <div class="pagination_sec">
        <div class="content_detail__pagination cdp">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a href="#" class="cdp_i" aria-disabled="true">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>prev
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="cdp_i">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>prev
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="cdp_i disabled">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="#" class="cdp_i current">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="cdp_i">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="cdp_i">
                    next <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </a>
            @else
                <a href="#" class="cdp_i" aria-disabled="true">
                    next <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </a>
            @endif
        </div>
    </div>
@endif
