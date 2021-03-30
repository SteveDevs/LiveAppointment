<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <form wire:submit.prevent="save" action="#" method="POST">
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3">
          <label class="block uppercase tracking-wide text-theme-color-dark text-xs font-bold mb-2" for="grid-password">
            {{ __('Title') }}
        </label>
        <input wire:model="permission.title" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="title" type="text" placeholder="{{ __('Title') }}">
        @error('permission.title')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
<button wire:click="save()" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-theme-color-green bg-opacity-75 hover:bg-opacity-100  hover:shadow-sm flex items-center">{{ __('Add') }}</button>
</form>

</div>
