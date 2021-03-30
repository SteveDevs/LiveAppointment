<div class="pagination flex rounded border border-theme-color-light  overflow-hidden divide-x divide-theme-color-light">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
    <button class="relative inline-flex items-center px-2 py-2 bg-white text-sm leading-5 font-medium text-theme-color-light-green"
        disabled>
        <span>&laquo;</span>
    </button>
    @else
    <button wire:click="previousPage"
        class="relative inline-flex items-center px-2 py-2 bg-white text-sm leading-5 font-medium text-theme-color-light-blue  hover:text-theme-color-light-green focus:z-10 focus:outline-none focus:border-theme-color-light-blue focus:shadow-outline-blue active:bg-theme-color-light active:text-theme-color-light-green transition ease-in-out duration-150">
        <span>&laquo;</span>
    </button>
    @endif

    <div class="divide-x divide-theme-color-light">
        @foreach ($elements as $element)
        @if (is_string($element))
        <button class="-ml-px relative inline-flex items-center px-4 py-2 bg-white text-sm leading-5 font-medium text-theme-color-dark text-opacity-75" disabled>
            <span>{{ $element }}</span>
        </button>
        @endif

        <!-- Array Of Links -->

        @if (is_array($element))
        @foreach ($element as $page => $url)
        <button wire:click="gotoPage({{ $page }})"
                class="-mx-1 relative inline-flex items-center px-4 py-2 text-sm leading-5 font-medium text-theme-color-dark text-opacity-75 hover:text-opacity-80 focus:z-10 focus:outline-none focus:border-theme-color-light-green  focus:shadow-outline-theme-color-light-green  active:bg-theme-color-light active:text-theme-color-dark active:text-opacity-80 transition ease-in-out duration-150 {{ $page === $paginator->currentPage() ? 'bg-gray-200' : 'bg-white' }}">
            {{ $page }}
            </button>
        @endforeach
        @endif
        @endforeach
    </div>

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
    <button wire:click="nextPage"
        class="-ml-px relative inline-flex items-center px-2 py-2 bg-white text-sm leading-5 font-medium text-theme-color-light-blue  hover:text-theme-color-green focus:z-10 focus:outline-none focus:border-theme-color-green focus:shadow-outline-theme-color-light-green active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
        <span>&raquo;</span>
    </button>
    @else
    <button
        class="-ml-px relative inline-flex items-center px-2 py-2 bg-white text-sm leading-5 font-medium text-theme-color-light-green "
        disabled><span>&raquo;</span></button>
    @endif
</div>
