<div class="flex justify-between">
<!-- Previous Page Link -->
@if ($paginator->onFirstPage())
<div class="w-32 flex justify-between items-center relative inline-flex items-center px-4 py-2 border border-theme-color-light text-sm leading-5 font-medium rounded-md text-theme-color-light-green bg-theme-color-light bg-opacity-40">
    <x-icons.arrow-left />
    {{ __('Previous') }}
</div>
@else
<button wire:click="previousPage" class="w-32 flex justify-between items-center relative inline-flex items-center px-4 py-2 border border-theme-color-light text-sm leading-5 font-medium rounded-md text-theme-color-dark text-opacity-60 bg-white hover:text-opacity-80  focus:outline-none focus:shadow-outline-theme-color-light-green  focus:border-theme-color-light-blue active:bg-gray-100 active:text-theme-color-dark active:text-opacity-80 transition ease-in-out duration-150">
    <x-icons.arrow-left />
    {{ __('Previous') }}
</button>
@endif


<!-- Next Page pnk -->
@if ($paginator->hasMorePages())
<button wire:click="nextPage" class="w-32 flex justify-between items-center relative inline-flex items-center px-4 py-2 border border-theme-color-light text-sm leading-5 font-medium rounded-md text-theme-color-dark text-opacity-60 bg-white hover:text-opacity-80 focus:outline-none focus:shadow-outline-blue focus:border-theme-color-light-blue active:bg-gray-100 active:text-theme-color-dark active:text-opacity-80 transition ease-in-out duration-150">
    {{ __('Next') }}
    <x-icons.arrow-right />
</button>
@else
<div class="w-32 flex justify-between items-center relative inline-flex items-center px-4 py-2 border border-theme-color-light text-sm leading-5 font-medium rounded-md text-gray-400 bg-gray-50">
    {{ __('Next') }}
    <x-icons.arrow-right class="inline" />
</div>
@endif
</div>
