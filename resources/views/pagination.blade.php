@if ($paginator->hasPages())
    <nav aria-label="...">
        <ul class="pagination d-flex justify-content-center">
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
                    <span class="text-muted">Next</span>
                </a>
            </li>
        @endif
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}"><a class="page-link text-muted" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endfor
            @if (!$paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link" href="{{$paginator->previousPageUrl()}}" aria-label="Previous">
                        <span class="text-muted">Previous</span>
                    </a>
                </li>
            @endif
    </ul>
</nav>
@endif
