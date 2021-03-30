<div wire:click.prefetch="toggle('{{ $index }}')"
    class="@if($column['hidden']) relative table-cell h-12 w-3 bg-theme-color-light hover:bg-theme-color-light-blue overflow-none align-top group @else hidden @endif"
    style="min-width:12px; max-width:12px">
    <button class="relative h-12 w-3 focus:outline-none">
        <span
            class="w-32 hidden group-hover:inline-block absolute z-10 top-0 left-0 ml-3 bg-theme-color-light-blue font-medium leading-4 text-xs text-left text-theme-color-light-green  tracking-wider transform uppercase focus:outline-none">
            {{ str_replace('_', ' ', $column['label']) }}
        </span>
    </button>
    <svg class="absolute text-blue-100 fill-current w-full inset-x-0 bottom-0"
        viewBox="0 0 314.16 207.25">
        <path stroke-miterlimit="10" d="M313.66 206.75H.5V1.49l157.65 204.9L313.66 1.49v205.26z" />
    </svg>
</div>
<div
    class="@if($column['hidden']) hidden @else relative h-12 overflow-hidden align-top flex table-cell @endif">
    <button wire:click.prefetch="sort('{{ $index }}')"
        class="w-full h-full px-6 py-3 border-b border-theme-color-light  bg-theme-color-light bg-opacity-40 text-xs leading-4 font-medium text-theme-color-dark text-opacity-80 uppercase tracking-wider flex justify-between items-center focus:outline-none">
        <span class="inline flex-grow @if($column['align'] === 'right') text-right @elseif($column['align'] === 'center') text-center @endif"">{{ str_replace('_', ' ', $column['label']) }}</span>
        <span class="inline text-xs text-theme-color-light-blue">
            @if($sort === $index)
            @if($direction)
            <x-icons.chevron-up class="h-6 w-6 text-theme-color-green  stroke-current" />
            @else
            <x-icons.chevron-down class="h-6 w-6 text-theme-color-green  stroke-current" />
            @endif
            @endif
        </span>
    </button>
    <button wire:click.prefetch="toggle('{{ $index }}')"
        class="absolute bottom-1 right-1 focus:outline-none">
        <x-icons.arrow-circle-left class="h-3 w-3 text-theme-color-dark text-opacity-60 hover:text-opacity-80" />
    </button>
</div>
