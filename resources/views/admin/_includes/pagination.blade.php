@if ($data->hasPages())
    <nav aria-label="page navigation">
        <ul class="m-4 pagination justify-content-center">
            @if ($data->currentPage() == 1)
                <li class="page-item disabled">
                    <a class="page-link disabled" href="{{ $data->previousPageUrl() }}&perPage={{ $data->perPage() }}">
                        Previous </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $data->previousPageUrl() }}&perPage={{ $data->perPage() }}">
                        Previous </a>
                </li>
            @endif
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                @if ($i == $data->currentPage())
                    <li class="page-item active">
                        <a class="page-link"
                            href="{{ $data->url($i) }}&perPage={{ $data->perPage() }}">{{ $i }}</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link"
                            href="{{ $data->url($i) }}&perPage={{ $data->perPage() }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            @if ($data->currentPage() == $data->lastPage())
                <li class="page-item disabled">
                    <a class="page-link disabled" href="{{ $data->nextPageUrl() }}&perPage={{ $data->perPage() }}">
                        Next </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $data->nextPageUrl() }}&perPage={{ $data->perPage() }}">Next
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
