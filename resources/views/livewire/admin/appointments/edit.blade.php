<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <form wire:submit.prevent="save" action="#" method="POST">
        <link rel="stylesheet" href="{{ asset('css/pureSelect.css') }}">
        
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="client">
                    {{ __('Client') }}
                </label>
                <div wire:ignore>
                <span id="client"></span>
                </div>
              
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="employee">
                    {{ __('Employee') }}
                </label>
                <div wire:ignore>
                <span id="employee"></span>
                </div>
                
            </div>
        </div>
        <div class="-mx-3 md:flex mb-2">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="price">
                    {{ __('Price') }} {{ config('currency')['symbol_native'] }}
                </label>

                <input wire:model="appointment.price" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="price" name="price" type="number" min="0" step="any">
               
            </div>
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="status">{{ __('Status') }}</label>

                <div wire:ignore>
                    <span id="status"></span>
                </div>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-2">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="startDate">{{ __('Start Date') }}</label>

                <input type="text" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="startDate" placeholder="{{ __('Select Start Date') }}" data-input>
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="startDate">{{ __('Finish Date') }}</label>

                <input type="text" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="finishDate" placeholder="{{ __('Select Finish Date') }}" data-input>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-2">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="startDate">{{ __('Confirmed') }}</label>

                  <!-- Toggle Button -->
                <label for="toogleA" class="flex items-center cursor-pointer">
                    <!-- toggle -->
                <div class="relative">
                <!-- input -->
                    <input id="toogleA" wire:model="appointment.confirmed" type="checkbox" class="hidden" />
                    <!-- line -->
                <div class="toggle__line w-10 h-4 bg-theme-color-light-blue rounded-full shadow-inner"></div>
                 <!-- dot -->
                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
                </div>

                </label>
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="service">{{ __('Service') }}</label>
            <div id="serviceBlock" wire:ignore>
                <span id="service"></span>
            </div>
            </div>
        </div>
        <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="comments">
                {{ __('Comments') }}
            </label>
            <textarea wire:model="appointment.comments" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="comments" name="comments" type="textarea" placeholder="" rows="10">
            </textarea>
        </div>
        <button wire:click="save()" id="save" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-theme-color-green bg-opacity-75 hover:bg-opacity-100  hover:shadow-sm flex items-center">{{ __('Update') }}</button>

    </form>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
<script type="text/javascript" src="{{ asset('js/select-pure/dist/bundle.min.js') }}"></script>
<script type="text/javascript">

    $("#startDate").flatpickr({
        enableTime: true,
        altFormat: "F, d Y H:i",
        dateFormat: "Y-m-d H:i:s",
        defaultDate: "{{ $appointment->start_time }}",
        onChange: function(selectedDates, dateStr, instance) {
            window.livewire.emit('startDateUpdate', dateStr); 
        }
    });

    $("#finishDate").flatpickr({
        enableTime: true,
        altFormat: "F, d Y H:i",
        dateFormat: "Y-m-d H:i:s",
        defaultDate: "{{ $appointment->finish_time }}",
        onChange: function(selectedDates, dateStr, instance) {
            window.livewire.emit('finishDateUpdate', dateStr); 
        }
    });

    const employeesOptions = JSON.parse("{{ $employees }}".replace(/&quot;/g,'"'));
    const clientsOptions = JSON.parse("{{ $clients }}".replace(/&quot;/g,'"'));
    const initChosenServices = JSON.parse("{{ $initChosenServices }}".replace(/&quot;/g,'"'));
  
    var servicesOptions = JSON.parse("{{ $employeeServices }}".replace(/&quot;/g,'"'));

    const statusOptions = [
        {
            'label': "{{ __('Created') }}",
            'value': "CREATED"
        },
        {
            'label': "{{ __('Completed') }}",
            'value': "COMPLETED"
        },
        {
            'label': "{{ __('Current') }}",
            'value': "CURRENT"
        },
        {
            'label': "{{ __('Cancelled') }}",
            'value': "CANCELLED"
        }
    ];

    const chosenStatus = "{{ $appointment->status }}";

    new SelectPure("#status", {
        options: statusOptions,
        autocomplete: true,
        value: chosenStatus,
        onChange: value => {
            window.livewire.emit('statusUpdate', value); 
        },
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

    new SelectPure("#employee", {
        options: employeesOptions,
        value: "{{ $appointment->employee_id }}",
        autocomplete: true,
        onChange: value => {
            window.livewire.emit('employeeUpdate', value); 
        },
        
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

    clients = new SelectPure("#client", {
        options: clientsOptions,
        value: "{{ $appointment->client_id }}",
        autocomplete: true,
        
        onChange: value => { 
            window.livewire.emit('clientUpdate', value);
        },
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

    services = new SelectPure("#service", {
        options: servicesOptions,
        value: initChosenServices.flat(),
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

    Livewire.on('changeEmployee', (employeeServices) => {

        servicesOptions = JSON.parse(employeeServices);
        delete services;
        var ele = document.getElementById("service");
        ele.remove();

        var serviceSpan = document.createElement('span');
        serviceSpan.setAttribute("id", "service");

        var element = document.getElementById("serviceBlock");
        element.appendChild(serviceSpan); 

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

    });
</script>
@endpush
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<style type="text/css">
    .toggle__dot {
        top: -.25rem;
        left: -.25rem;
        transition: all 0.3s ease-in-out;
    }

    input:checked ~ .toggle__dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }
</style>