<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <form wire:submit.prevent="save" action="#" method="POST"> 
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
            {{ __('Company Name') }}
        </label>
        <input wire:model="setting.company_name" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="grid-first-name" type="text" placeholder="{{ __('Company Name') }}">
        @error('$setting.company_name')
        <p class="text-red text-xs italic">{{ $message }}</p>
        @enderror
    </div>
    <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
        {{ __('Currencies') }}
        </label>
        <div class="relative">
            <select wire:model="currency" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="currency">
            <option value="0">Select currency</option>
            @foreach($currencies as $key => $value)
            <option <?php echo ($this->setting->currency == $value['code']) ? 'selected' : ''; ?> value="{{ $value['code'] }}">{{ $value['code'] }}</option>
            @endforeach</select>

            @error('role')
            <p class="text-red text-xs italic">{{ __('Choose a role') }}</p>
            @enderror
        </div>
    </div>
</div>
      
    <button wire:click="save()" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-theme-color-green bg-opacity-75 hover:bg-opacity-100  hover:shadow-sm flex items-center">{{ __('Update') }}</button>
    </form>
</div>
@push('scripts')
<script type="text/javascript">
</script>
@endpush