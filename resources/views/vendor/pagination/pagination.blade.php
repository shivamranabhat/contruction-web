

@if ($paginator->lastPage() > 1)
<div class="pagination flex justify-center mt-10">
    <ul class="flex gap-4 items-center">
        {{-- @if ($paginator->onFirstPage())
        <button disabled class="cursor-not-allowed flex gap-2 border-2 border-main text-main items-center px-2 rounded-xl h-full">Prev
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
              </svg>              
        </button>
        @else
        <button wire:click.prevent="prevPage" class="cursor-pointer flex gap-2 bg-main text-white items-center px-2 rounded-xl h-full">Prev
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
              </svg>
              
        </button>
        @endif --}}

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="cursor-pointer border border-2 border-main {{$paginator->currentPage() == $i ? 'bg-main text-white' : 'text-main'}} rounded-full py-2 px-4" wire:click.prevent="gotoPage({{ $i }})">
            {{ $i }}
        </li>
        @endfor
        {{-- @if ($paginator->hasMorePages())
        <button wire:click.prevent="nextPage" class="cursor-pointer flex gap-2 bg-main text-white items-center px-2 rounded-xl h-full">Next
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
        @else 
        <button disabled class="cursor-not-allowed  flex gap-2 border-2 border-main text-main items-center px-2 rounded-xl h-full">Next
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
        @endif --}}
    </ul>
</div>
@endif