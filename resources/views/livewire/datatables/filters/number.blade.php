<div class="flex flex-col w-32">
    <div x-data class="flex flex-col relative">
        <input
            x-ref="input"
            type="number"
            wire:input.debounce.500ms="doNumberFilterStart('{{ $index }}', $event.target.value)"
            class="m-1 pr-6 text-sm leading-4 flex-grow form-input appearance-none border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded  outline-none"
            placeholder="{{ __('MIN') }}"
        />
        <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
            <button x-on:click="$refs.input.value=''" wire:click="doNumberFilterStart('{{ $index }}', '')" class="inline-flex text-theme-color-light-blue  hover:text-theme-color-light-green  focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="h-3 w-3 stroke-current" />
            </button>
        </div>
    </div>

    <div x-data class="flex flex-col relative">
        <input
            x-ref="input"
            type="number"
            wire:input.debounce.500ms="doNumberFilterEnd('{{ $index }}', $event.target.value)"
            class="m-1 pr-6 text-sm leading-4 flex-grow form-input appearance-none border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded  outline-none"
            placeholder="{{ __('MAX') }}"
        />
        <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
            <button x-on:click="$refs.input.value=''" wire:click="doNumberFilterEnd('{{ $index }}', '')" class="inline-flex text-theme-color-light-blue  hover:text-theme-color-light-green  focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="h-3 w-3 stroke-current" />
            </button>
        </div>
    </div>
</div>