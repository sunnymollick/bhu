@if($temples->hasPages())
    <div class="sigma_pagination">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($temples->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="far fa-chevron-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $temples->previousPageUrl() }}" rel="prev">
                        <i class="far fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($temples->getUrlRange(1, $temples->lastPage()) as $page => $url)
                @if ($page == $temples->currentPage())
                    <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($temples->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $temples->nextPageUrl() }}" rel="next">
                        <i class="far fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="far fa-chevron-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
