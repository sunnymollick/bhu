@if($organizations->hasPages())
    <div class="sigma_pagination">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($organizations->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="far fa-chevron-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $organizations->previousPageUrl() }}" rel="prev">
                        <i class="far fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($organizations->getUrlRange(1, $organizations->lastPage()) as $page => $url)
                @if ($page == $organizations->currentPage())
                    <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($organizations->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $organizations->nextPageUrl() }}" rel="next">
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
