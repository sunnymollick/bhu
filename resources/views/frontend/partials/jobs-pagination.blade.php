@if ($jobs->hasPages())
    <ul class="pagination mb-0 mt-4">
        {{-- Previous Page Link --}}
        @if ($jobs->onFirstPage())
            <li class="page-item disabled"><span class="page-link"><i class="far fa-chevron-left"></i></span></li>
        @else
            <li class="page-item"><a class="page-link" href="#" data-page="{{ $jobs->currentPage() - 1 }}"><i class="far fa-chevron-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
            @if ($page == $jobs->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="#" data-page="{{ $page }}">{{ $page }}</a></li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($jobs->hasMorePages())
            <li class="page-item"><a class="page-link" href="#" data-page="{{ $jobs->currentPage() + 1 }}"><i class="far fa-chevron-right"></i></a></li>
        @else
            <li class="page-item disabled"><span class="page-link"><i class="far fa-chevron-right"></i></span></li>
        @endif
    </ul>
@endif
