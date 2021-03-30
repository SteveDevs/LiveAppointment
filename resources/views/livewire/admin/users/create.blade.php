<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <form wire:submit.prevent="save" action="#" method="POST"> 

        <link rel="stylesheet" href="{{ asset('css/pureSelect.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">{{ __('Name') }}</label>
                <input wire:model="name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border borders-red rounded py-3 px-4 mb-3" id="name" type="text" placeholder="{{ __('Name') }}">
                @error('name')
                <p class="text-red text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">{{ __('Email') }}</label>
                <input wire:model="email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="email" type="text" placeholder="">
                @error('email')
                <p class="text-red text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="password">{{ __('Password') }}</label>
                <input wire:model="password" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="password" type="password" placeholder="********">
                @error('user.password')
                <p class="text-red text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                    {{ __('Role') }}
                </label>
                <div class="relative">
                    <div wire:ignore>
                        <span id="role"></span>
                    </div>
                    @error('role')
                    <p class="text-red text-xs italic">{{ __('Choose a role') }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <button wire:click="save()" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-theme-color-green bg-opacity-75 hover:bg-opacity-100  hover:shadow-sm flex items-center">{{ __('Add') }}</button>
    </form>
</div>
@push('scripts')
<script type="text/javascript" src="{{ asset('js/select-pure/dist/bundle.min.js') }}"></script>
<script type="text/javascript">
    const roles = JSON.parse("{{ $roles }}".replace(/&quot;/g,'"'));
        var select = new SelectPure("#role", {
            options: roles,
            autocomplete: true,
            onChange: value => {
                window.livewire.emit('updateRole', value); 
            },
            icon: "fa fa-remove w-5 text-white"
        });
</script>
@endpush