@if ($paginator->hasPages())
    <nav>
        <ul class="pagination flex gap-7">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled flex items-center" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true" class="bg-[#545454] py-5 w-20 text-white font-ibm uppercase">before</span>
                </li>
            @else
                <li class="flex items-center">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="bg-[#545454] py-5 w-20 text-white font-ibm uppercase">before</a>
                </li>
            @endif


            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="flex items-center">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="bg-[#545454] py-5 w-20 text-white font-ibm uppercase">after</a>
                </li>
            @else
                <li class="flex items-center disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true" class="bg-[#545454] py-5 w-20 text-white font-ibm uppercase">after</span>
                </li>
            @endif
        </ul>
    </nav>
@endif