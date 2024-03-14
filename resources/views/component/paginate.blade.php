<div class="pagination mt-4 pb-4">
    @if ($docs->lastPage() > 1)
        <ul class="pagination mx-auto">
            <li class="page-item {{ ($docs->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $docs->url(1) }}">«</a>
            </li>
            <li class="page-item {{ ($docs->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $docs->url($docs->currentPage() - 1) }}">‹</a>
            </li>
            <li class="page-item {{ ($docs->currentPage() == 1) ? ' active' : '' }}">
                <a class="page-link" href="{{ $docs->url(1) }}">1</a>
            </li>
            @if ($docs->currentPage() > 3)
                <li class="page-item"><a class="page-link" href="{{ $docs->url($docs->currentPage() - 2) }}">...</a></li>
            @endif
            @for ($i = max(2, $docs->currentPage() - 1); $i <= min($docs->lastPage(), $docs->currentPage() + 1); $i++)
                <li class="page-item {{ ($docs->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $docs->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            @if ($docs->currentPage() < $docs->lastPage() - 2)
                <li class="page-item"><a class="page-link" href="{{ $docs->url($docs->currentPage() + 2) }}">...</a></li>
            @endif
            <li class="page-item {{ ($docs->currentPage() == $docs->lastPage()) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $docs->url($docs->currentPage() + 1) }}">›</a>
            </li>
            <li class="page-item {{ ($docs->currentPage() == $docs->lastPage()) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $docs->url($docs->lastPage()) }}">»</a>
            </li>
        </ul>
    @endif
</div>
