<div class="row align-items-center">
    <div class="col-md-6">
        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries
        </div>
    </div>
    <div class="col-md-6">
        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
            @if ($paginator->hasPages())
            <ul class="pagination">
                {{-- Previous Page Link --}}
                <li class="paginate_button page-item previous {{ $paginator->onFirstPage() ? 'disabled' : '' }}"
                    id="datatable_previous">
                    <a href="{{ $paginator->previousPageUrl() }}" aria-controls="datatable" data-dt-idx="previous"
                        tabindex="0" class="page-link">Previous</a>
                </li>

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <li class="paginate_button page-item disabled" aria-disabled="true">
                    <span class="page-link">{{ $element }}</span>
                </li>
                @endif

                {{-- Array of links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                <li class="paginate_button page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}" aria-controls="datatable" data-dt-idx="{{ $page }}" tabindex="0"
                        class="page-link">{{ $page }}</a>
                </li>
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                <li class="paginate_button page-item next {{ $paginator->hasMorePages() ? '' : 'disabled' }}"
                    id="datatable_next">
                    <a href="{{ $paginator->nextPageUrl() }}" aria-controls="datatable" data-dt-idx="next" tabindex="0"
                        class="page-link">Next</a>
                </li>
            </ul>
            @endif
        </div>
    </div>
</div>