@if ($paginator->hasPages())
    <ul class="am-pagination am-text-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="am-disabled"><span class="page-link">&laquo;</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="am-active">
                            <span title="{{$cateName}}_第{{$page}}页_{{config('site.title')}}">{{ $page }}</span>
                        </li>
                    @else
                        <li>
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
            <li class="am-disabled"><span class="page-link">&raquo;</span></li>
        @endif
    </ul>
@endif
