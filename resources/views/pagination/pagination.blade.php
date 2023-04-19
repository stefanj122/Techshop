@if ($products->hasPages())
    <div class="pagination-container">
        <ul class="pagination">
            @if ($products->currentPage() == 1)
                <li class="page-item disabled">
                    <a class="page-link disabled"
                        href="{{ $products->previousPageUrl() }}&perPage={{ $products->perPage() }}"> Previous </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $products->previousPageUrl() }}&perPage={{ $products->perPage() }}">
                        Previous </a>
                </li>
            @endif
            @for ($i = 1; $i <= $products->lastPage(); $i++)
                @if ($i == $products->currentPage())
                    <li class="page-item current">
                        <a class="page-link current"
                            href="{{ $products->url($i) }}&perPage={{ $products->perPage() }}">{{ $i }}</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link"
                            href="{{ $products->url($i) }}&perPage={{ $products->perPage() }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            @if ($products->currentPage() == $products->lastPage())
                <li class="page-item disabled">
                    <a class="page-link disabled"
                        href="{{ $products->nextPageUrl() }}&perPage={{ $products->perPage() }}"> Next </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link"
                        href="{{ $products->nextPageUrl() }}&perPage={{ $products->perPage() }}">Next </a>
                </li>
            @endif
        </ul>
    </div>
@endif

