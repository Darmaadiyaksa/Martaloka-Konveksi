@if ($paginator->hasPages())
    <ul class="styled-pagination clearfix">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="arrow prev disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
              <span class="icon-right-arrow-1 left"></span>
            </li>
        @else
            <li class="arrow prev click">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><span class="icon-right-arrow-1 left"></span></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @if($paginator->currentPage() > 3)
            <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1</a></li>
        @endif
        @if($paginator->currentPage() > 4)
            <li class="disabled hidden-xs">...</li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <li class="disabled hidden-xs">...</li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="arrow next click">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span class="icon-right-arrow-1 right"></span></a>
            </li>
        @else
            <li class="arrow next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="icon-right-arrow-1 right"></span>
            </li>
        @endif
    </ul>
@endif
