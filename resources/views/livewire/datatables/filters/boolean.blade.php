<div x-data class="flex flex-col">
    <select
        x-ref="select"
        name="{{ $name }}"
        class="m-1 text-sm leading-4 flex-grow form-select"
        wire:input="doBooleanFilter('{{ $index }}', $event.target.value)"
        x-on:input="$refs.select.value=''"
    >
        <option value=""></option>
        <option value="0">{{ __('No</option>
        <option value="1">{{ __('Yes</option>
    </select>

    <div class="flex flex-wrap max-w-48 space-x-1">
        @isset($this->activeBooleanFilters[$index])
        @if($this->activeBooleanFilters[$index] == 1)
        <button wire:click="removeBooleanFilter('{{ $index }}')"
            class="appearance-none block border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none">
            <span>{{ __('YES</span>
            <x-icons.x-circle />
        </button>
        @elseif(strlen($this->activeBooleanFilters[$index]) > 0)
        <button wire:click="removeBooleanFilter('{{ $index }}')"
            class="appearance-none block  border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none">
            <span>{{ __('No') }}</span>
            <x-icons.x-circle />
        </button>
        @endif
        @endisset
    </div>
</div>