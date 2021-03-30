<div x-data class="flex flex-col">
    <div class="w-full relative flex">
        <input x-ref="start" class="m-1 text-sm pt-1 pr-6 flex-grow form-input appearance-none  border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded  outline-none" type="time"
            wire:change="doTimeFilterStart('{{ $index }}', $event.target.value)" style="padding-bottom: 5px" />
            <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
            <button x-on:click="$refs.start.value=''" wire:click="doTimeFilterStart('{{ $index }}', '')" class="inline-flex text-theme-color-light-blue  hover:text-theme-color-light-green focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="h-3 w-3 stroke-current" />
            </button>
        </div>
    </div>
    <div class="w-full relative flex">
        <input x-ref="end" class="m-1 text-sm pt-1 pr-6 flex-grow form-input appearance-none border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded outline-none" type="time"
            wire:change="doTimeFilterEnd('{{ $index }}', $event.target.value)" style="padding-bottom: 5px" />
            <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
            <button x-on:click="$refs.end.value=''" wire:click="doTimeFilterEnd('{{ $index }}', '')" class="inline-flex text-theme-color-light-blue  hover:text-theme-color-light-green  focus:outline-none" tabindex="-1">
                <x-icons.x-circle class="h-3 w-3 stroke-current" />
            </button>
        </div>
    </div>
</div>