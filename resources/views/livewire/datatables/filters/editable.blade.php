<div x-data class="flex flex-col">
    <input
        x-ref="input"
        type="text"
        class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none "
        wire:change="doTextFilter('{{ $index }}', $event.target.value)"
        x-on:change="$refs.input.value = ''"
    />
    <div class="flex flex-wrap max-w-48 space-x-1">
        @foreach($this->activeTextFilters[$index] ?? [] as $key => $value)
        <button wire:click="removeTextFilter('{{ $index }}', '{{ $key }}')" class="m-1 pl-1 flex items-center uppercase tracking-wide bg-theme-color-light-blue text-white hover:bg-theme-color-light-green  rounded-full focus:outline-none text-xs space-x-1">
            <span>{{ $this->getDisplayValue($index, $value) }}</span>
            <x-icons.x-circle />
        </button>
        @endforeach
    </div>
</div>
