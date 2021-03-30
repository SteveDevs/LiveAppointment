<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <form wire:submit.prevent="save" action="#" method="POST"> 

        <link rel="stylesheet" href="{{ asset('css/pureSelect.css') }}">
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                {{ __('Name') }}
            </label>
            <input wire:model="employee.name" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="name" type="text" placeholder="{{ __('Name') }}">
            @error('employee.name')
            <p class="text-red text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="phone">
            {{ __('Phone') }}
        </label>
        <input wire:model="employee.phone" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="phone" type="tel" placeholder="+1 240-824-1243">
        @error('employee.phone')
        <p class="text-red text-xs italic">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="-mx-3 md:flex mb-6">
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
        {{ __('Email') }}
    </label>
    <input wire:model="employee.email" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="email" type="email" placeholder="{{ __('Name') }}">
    @error('employee.email')
    <p class="text-red text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="md:w-1/2 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="chosenServices">{{ __('Services') }}</label>
    <div wire:ignore>
        <span id="service"></span>
    </div>
</div>
</div>
<button wire:click="save()" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-theme-color-green bg-opacity-75 hover:bg-opacity-100  hover:shadow-sm flex items-center">{{ __('Add') }}</button>
</form>
</div>
@push('scripts')
<script type="text/javascript" src="{{ asset('js/select-pure/dist/bundle.min.js') }}"></script>
<script type="text/javascript">
    const servicesOptions = JSON.parse("{{ $services }}".replace(/&quot;/g,'"'));

    services = new SelectPure("#service", {
        options: servicesOptions,
        multiple: true,
        autocomplete: true,
        onChange: value => { 
            window.livewire.emit('updateServices', value); 
        },
        icon: "fa fa-remove w-5 text-white",
        classNames: {
          select: "select-pure__select",
          dropdownShown: "select-pure__select--opened",
          multiselect: "select-pure__select--multiple",
          label: "select-pure__label",
          placeholder: "select-pure__placeholder",
          dropdown: "select-pure__options",
          option: "select-pure__option",
          autocompleteInput: "select-pure__autocomplete",
          selectedLabel: "select-pure__selected-label",
          selectedOption: "select-pure__option--selected",
          placeholderHidden: "select-pure__placeholder--hidden",
          optionHidden: "select-pure__option--hidden",
      }
  });
</script>
@endpush