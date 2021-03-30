<div x-data="{ showDeleteModal: @entangle('showDeleteModal') }">
        <!--Overlay-->
    <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showDeleteModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showDeleteModal }">
    <!--Dialog-->
    <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showDeleteModal" @click.away="showDeleteModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

    <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    {{ $deleteTitle }}
                </div>

                <!-- content -->
                <div class="text-gray-700">Are you sure you want to delete this record. This action cannot be undone.</div>

                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <div class="sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-indigo-700 transition ease-in-out duration-150 focus:ring-4 focus:ring-red-500 focus:ring-opacity-20 sm:text-sm sm:leading-5">
                            <svg wire:loading.delay class="animate-spin mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Delete
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="deleteHandle" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-20 transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancel</button>
                    </span>
                </div>
                </div>


            </div>
            <!--/Dialog -->
        </div><!-- /Overlay -->

</div>