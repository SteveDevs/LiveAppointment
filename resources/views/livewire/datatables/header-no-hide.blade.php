@if($column['hidden'])
@else
<div class="relative table-cell h-12 overflow-hidden align-top">
    <button wire:click.prefetch="sort('{{ $index }}')" class="w-full h-full px-6 py-3 border-b border-theme-color-light bg-theme-color-light bg-opacity-40 text-left text-xs leading-4 font-medium text-theme-color-dark text-opacity-60 uppercase tracking-wider flex items-center focus:outline-none @if($column['align'] === 'right') flex justify-end @elseif($column['align'] === 'center') flex justify-center @endif">
        <span class="inline ">{{ str_replace('_', ' ', $column['label']) }}</span>
        <span class="inline text-xs text-theme-color-light-blue ">
            @if($sort === $index)
            @if($direction)
            <x-icons.chevron-up wire:loading.remove class="h-6 w-6 text-theme-color-green stroke-current" />
            @else
            <x-icons.chevron-down wire:loading.remove class="h-6 w-6 text-theme-color-green stroke-current" />
            @endif
            @endif
        </span>
    </button>
</div>
@endif
