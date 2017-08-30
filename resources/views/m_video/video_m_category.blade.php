@if ($paginator->hasPages())
    <ul class="am-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="am-disabled"><a>&laquo;</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="am-disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="am-active">
                            <a title="{{$cateName}}_第{{$page}}页_{{config('site.title')}}">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a title="{{$cateName}}_第{{$page}}页_{{config('site.title')}}"
                               href="{{ route('video.category', ['id' => $id, 'page' => $page]) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
        @else
            <li><span>&raquo;</span></li>
        @endif
    </ul>
@endif
