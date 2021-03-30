<div x-data class="flex flex-col w-32">
    <input
        x-ref="input"
        type="text"
        class="m-1 text-sm leading-4 flex-grow form-input appearance-none border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded outline-none"
        wire:change="doTextFilter('{{ $index }}', $event.target.value)"
        x-on:change="$refs.input.value = ''" 
        
    />
    <div class="flex flex-wrap max-w-38 space-x-1">
        @foreach($this->activeTextFilters[$index] ?? [] as $key => $value)
        <button wire:click="removeTextFilter('{{ $index }}', '{{ $key }}')" class="m-1 pl-1 flex items-center uppercase tracking-wide bg-theme-color-light-blue  text-white hover:bg-theme-color-light-green  rounded-full focus:outline-none text-xs space-x-1">
            <span>{{ $this->getDisplayValue($index, $value) }}</span>
            <x-icons.x-circle />
        </button>
        @endforeach
    </div>
</div>
