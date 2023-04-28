@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-around">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="btn btn-primary" href="#" tabindex="-1">Kembali</a>
                </li>
            @else
                <li class="page-item">
                    <a class="btn btn-primary" href="{{ $paginator->previousPageUrl() }}">Kembali</a>
                </li>
            @endif

            <li class="page-item">
                <a class="btn btn-warning" href="" rel="next">Ragu - Ragu</a>
            </li>


            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <button class="btn btn-primary" id="savedata" link="{{ $paginator->nextPageUrl() }}">Berikut</button>
                    {{-- <a class="btn btn-primary save" id="save" tes="{{ $paginator->nextPageUrl() }}">lanjutkan</a> --}}

                </li>
            @else
                <li class="page-item disabled">
                    <button class="btn btn-primary" id="savedata" link="">Berikut</button>
                    <a class="btn btn-primary" href="#">Kirim</a>
                </li>
            @endif
        </ul>
@endif
{{-- @push('js-internal') --}}

{{-- @endpush --}}
