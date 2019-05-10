@if ($paginator->lastPage() > 1)
<div class="pagination">
    @if ($paginator->currentPage() !== 1)
        <a href="{{ $paginator->url(1) }}" class="prev-button"><i class="icon-angle-left"></i></a>
    @endif
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        @if ($paginator->currentPage() == $i)
            <span class="current">{{ $i }}</span>
        @else
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        @endif
    @endfor
    @if ($paginator->currentPage() !== $paginator->lastPage())
        <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="next-button"><i class="icon-angle-right"></i></a>
    @endif
</div>
@endif
