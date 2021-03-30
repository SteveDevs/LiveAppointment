<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4  flex flex-col my-2">
    <form wire:submit.prevent="save" action="#" method="POST">
        
        <link rel="stylesheet" href="{{ asset('css/pureSelect.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <button wire:click="save()" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-theme-color-green bg-opacity-75 hover:bg-opacity-100  hover:shadow-sm flex items-center">{{ __('Update') }}</button>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">{{ __('Title') }}</label>
                <input wire:model="role.title" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" id="title" type="text" placeholder="{{ __('Title') }}">
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="chosenPermissions">{{ __('Permissions') }}</label>
                <div wire:ignore>
                    <span id="permission" ></span> 
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script type="text/javascript" src="{{ asset('js/select-pure/dist/bundle.min.js') }}"></script>
<script type="text/javascript">
    const permissions = JSON.parse("{{ $permissions }}".replace(/&quot;/g,'"'));
    const initPermissions = JSON.parse("{{ $chosenPermissions }}".replace(/&quot;/g,'"'));
        var select = new SelectPure("#permission", {
            options: permissions,
            value: initPermissions,
            autocomplete: true,
            multiple: true,
            onChange: value => {
                console.log(select);
                window.livewire.emit('updatePermissions', value); 
            },
            icon: "fa fa-remove w-5 text-white"
        });
</script>
@endpush