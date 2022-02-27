@if ($paginator->hasPages())
    <ul class="c-nav2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="c-nav2__pre">
                <a href="{{ $paginator->previousPageUrl() }}"></a>
            </li>
        @else
            <li class="c-nav2__pre is-active">
                <a href="{{ $paginator->previousPageUrl() }}"></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="c-nav2__page"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="c-nav2__page c-nav2__current"><a href="{{ $url }}">{{ $page }}</a></li>
                    @else
                        <li class="c-nav2__page"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <li class="c-nav2__pagenum">{{ $paginator->currentPage() }}／{{ $paginator->lastPage() }}</li>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="c-nav2__next is-active">
                <a href="{{ $paginator->nextPageUrl() }}"></a>
            </li>
        @else
            <li class="c-nav2__next">
                <a href="{{ $paginator->nextPageUrl() }}"></a>
            </li>
        @endif
    </ul>
@endif