  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
      <form wire:submit.prevent="save" action="#" method="POST">
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
              {{ __('Name') }}
          </label>
          <input wire:model="client.name" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="name" type="text" placeholder="{{ __('Name') }}">
          @error('client.name')
          <p class="text-red text-xs italic">{{ $message }}</p>
          @enderror
      </div>
      <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
          {{ __('Phone') }}
      </label>
      <input wire:model="client.phone" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="phone" type="tel" placeholder="+1 240-824-1243">
      @error('client.phone')
      <p class="text-red text-xs italic">{{ $message }}</p>
      @enderror
  </div>
  </div>
  <div class="-mx-3 md:flex mb-6">
      <div class="md:w-full px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
          {{ __('Email') }}
      </label>
      <input wire:model="client.email" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="grid-password" type="email" placeholder="">
      @error('client.email')
      <p class="text-red text-xs italic">{{ $message }}</p>
      @enderror
  </div>
  </div>

  <button wire:click="save()" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-theme-color-green bg-opacity-75 hover:bg-opacity-100  hover:shadow-sm flex items-center">
      {{ __('Add') }}
  </button>
  </form>
  </div>
