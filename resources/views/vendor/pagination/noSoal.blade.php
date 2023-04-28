<style>
    .page-item.active .page-link {
        z-index: 3;
        color: #fff !important;
        background-color: #00ACD6 !important;
        border-color: #00ACD6 !important;
        border-radius: 50%;
        padding: 6px 12px;
    }

    .page-link {
        z-index: 3;
        color: #00ACD6 !important;
        background-color: #fff;
        border-color: #007bff;
        border-radius: 50%;
        padding: 6px 12px !important;
    }

    .page-item:first-child .page-link {
        border-radius: 30% !important;
    }

    .page-item:last-child .page-link {
        border-radius: 30% !important;
    }

    .pagination li {
        padding: 3px;
    }

    .disabled .page-link {
        color: #212529 !important;
        opacity: 0.5 !important;
    }
</style>

@if ($paginator->hasPages())

    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-around">

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

        </ul>
    </nav>
@endif
