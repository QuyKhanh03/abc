

<div class="product__pagination">
    @if ($paginator->onFirstPage())
        <a href="#"><i class="fa fa-long-arrow-left"></i></a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-long-arrow-left"></i></a>
    @endif

    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        @if ($i == $paginator->currentPage())
            <a href="#" class="active">{{ $i }}</a>
        @else
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        @endif
    @endfor



    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-long-arrow-right"></i></a>
    @else
        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
    @endif
</div>
