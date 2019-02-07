@if ($paginator->hasPages())
    <nav class="pagination" role="navigation" aria-label="pagination">
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" title="This is the first page" disabled>Previous</a>
            <a class="pagination-next"  href="{{ $paginator->nextPageUrl() }}">Next page</a>
        @elseif ($paginator->hasMorePages())
            <a class="pagination-previous"  href="{{ $paginator->previousPageUrl() }}">Previous</a>
            <a class="pagination-next"  href="{{ $paginator->nextPageUrl() }}">Next page</a>
            @elseif (!$paginator->hasMorePages())
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" >Previous</a>
            <a class="pagination-next"  disabled>Next page</a>
        @endif




        <ul class="pagination-list">

            @foreach ($elements as $element)


                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li >
                                <a class="pagination-link is-current" aria-label="Page {{ $page }}" aria-current="page">{{ $page }}</a>
                            </li>

                        @else
                            <li class="pclick">
                                <a href="{{ $url }}" data-url="{{ $url }}" class="pclick pagination-link" aria-label="Goto page {{ $page }}">{{ $page }}</a>
                            </li>

                        @endif
                    @endforeach
                @endif

                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

            @endforeach
        </ul>
    </nav>
@endif
