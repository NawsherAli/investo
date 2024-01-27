<style type="text/css">
   nav ul  li.page-item{
        background-color: red;
    }
</style>

@if ($paginator->hasPages())
    <nav class="m-t-20 d-flex justify-content-center">
        <ul class="pagination justify-content-end">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item previous" style="background-color: white; border: 1px solid #rgba(0, 0, 50, 0.9) " aria-disabled="true" aria-label="@lang('pagination.previous')"><a class=" " href="#" style="background-color: white ; border: none; color: rgba(0, 0, 50, 0.9) ">Previous</a></li>
                <!-- <li class="page-item disabled " aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">Previous</span>
                </li> -->
            @else
               <!--  <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="page-link">Previous</a>
                </li> -->
                <li class="page-item previous" style="background-color: rgba(0, 0, 50, 0.9) ;" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="background-color: rgba(0, 0, 50, 0.9); border: none; color: white">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled page-item" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active page-item" aria-current="page" style="background-color: white; width: 40px; height: 40px"><span style="background-color: rgba(0, 0, 50, 0.9);border-radius: 100%; border: none">{{ $page }}</span></li>
                        @else
                            <li style="background-color: white; border: none;"><a href="{{ $url }}" style="background-color: white; border: none; color: rgba(0, 0, 50, 0.9)" >{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                
                <li class="page-item previous" style="background-color: rgba(0, 0, 50, 0.9); border: 1px solid rgba(0, 0, 50, 0.9);" aria-disabled="true" aria-label="@lang('pagination.previous')"><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="background-color:rgba(0, 0, 50, 0.9) ; border: none; color: white; border: none;">Next</a></li>
            @else
                <!-- <li class=" page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')" style="background-color: white; border: 1px solid 219653">
                    <span class="page-item" aria-hidden="true" style="background-color: white; border: none; color: 219653">Next</span>
                </li> -->
                <li class="page-item previous" style="background-color: white; border: 1px solid #rgba(0, 0, 50, 0.9);" aria-disabled="true" aria-label="@lang('pagination.previous')"><a  rel="next" aria-label="@lang('pagination.next')" style="background-color:white ; border: none; color: rgba(0, 0, 50, 0.9) ; border: none;">Next</a></li>
            @endif
        </ul>
    </nav>
@endif
