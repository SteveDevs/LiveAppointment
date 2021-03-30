
<div>
    <div class="pb-9">
    <h3 class="text-lg leading-6 font-medium text-theme-color-dark text-opacity-80">
    {{ $tableName }}
    </h3>
</div>
     @if($beforeTableSlot)
        <div class="mt-8">
            @include($beforeTableSlot)
        </div>
    @endif
    <div class="relative">
        <div class="flex justify-between items-center mb-1">
            <div class="flex-grow h-10 flex items-center">
                
                @if($this->searchableColumns()->count())
                <div class="w-full flex rounded-lg shadow-sm">
                    <div class="w-24 pl-3 flex items-center pointer-events-none ">
                        <svg class="h-4 w-4 text-theme-color-dark text-opacity-80" viewBox="0 0 20 20" stroke="currentColor" fill="none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                    </div>
                    <div class="relative w-full flex-grow focus-within:z-10 bg-white">

                        
                        <input wire:model.debounce.500ms="search" class="w-full text-grey-800 transition focus:outline-none focus:border-transparent p-2 appearance-none leading-normal text-base float-right" placeholder="{{ __('Search in columns') }}" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button wire:click="$set('search', null)" class="text-theme-color-dark text-opacity-80 hover:text-theme-color-dark focus:outline-none">
                                <x-icons.x-circle class="h-5 w-5 stroke-current" />
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                @endif

            </div>

            <div class="flex items-center space-x-1">
                <x-icons.cog wire:loading class="h-9 w-9 animate-spin text-theme-color-green " />
                @if($this->showNew)
                    </button>
                         <a class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-theme-color-green bg-opacity-75 hover:bg-opacity-100  hover:shadow-lg flex items-center" href="{{ route($this->newLink) }}"><span>{{ __('New') }}</span><svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg></a>
                @endif
                @if($exportable)
                <div x-data="{ init() {
                    window.livewire.on('startDownload', link => window.open(link,'_blank'))
                } }" x-init="init">
                    <button wire:click="export" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-theme-color-light-green bg-opacity-75 hover:bg-opacity-100 hover:shadow-lg flex items-center">{{ __('Export') }}
                    </button>
                </div>

                @endif

                @if($hideable === 'select')
                @include('datatables::hide-column-multiselect')
                @endif
            </div>
            
        </div>

        @if($hideable === 'buttons')
        <div class="p-2 grid grid-cols-8 gap-2">
            @foreach($this->columns as $index => $column)
            <button wire:click.prefetch="toggle('{{ $index }}')" class="px-3 py-2 rounded text-white text-xs focus:outline-none
            {{ $column['hidden'] ? 'bg-white hover:bg-blue-300 text-blue-600' : 'bg-blue-500 hover:bg-blue-800' }}">
                {{ $column['label'] }}
            </button>
            @endforeach
        </div>
        @endif

        <div class="rounded-lg shadow-lg bg-white max-w-screen overflow-x-scroll">
            <div class="rounded-lg @unless($this->hidePagination) rounded-b-none @endif">
                <div class="table align-middle min-w-full">
                    @unless($this->hideHeader)
                    <div class="table-row divide-x divide-gray-200">
                        @foreach($this->columns as $index => $column)
                            @if($hideable === 'inline')
                                @include('datatables::header-inline-hide', ['column' => $column, 'sort' => $sort])
                            @elseif($column['type'] === 'checkbox')
                            <div class="relative table-cell h-12 w-24 overflow-hidden align-top px-6 py-3 border-b border-theme-color-light bg-theme-color-light bg-opacity-30 
                            text-theme-color-dark text-opacity-60
                             text-left text-xs leading-4 font-medium   uppercase tracking-wider flex items-center focus:outline-none">
                                <div class="px-3 py-1 rounded  text-gray-600 text-center">
                                    {{ count($selected) }}
                                </div>
                            </div>
                            @else
                                @include('datatables::header-no-hide', ['column' => $column, 'sort' => $sort])
                            @endif
                        @endforeach
                    </div>

                    <div class="table-row divide-x divide-blue-200 bg-white">
                        @foreach($this->columns as $index => $column)
                            @if($column['hidden'])
                                @if($hideable === 'inline')
                                    <div class="table-cell w-5 overflow-hidden align-top bg-white"></div>
                                @endif
                            @elseif($column['type'] === 'checkbox')

                                <div class="w-20 overflow-hidden align-top bg-white px-1 py-3 border-b border-theme-color-light bg-white text-left text-xs leading-4 font-medium text-theme-color-dark text-opacity-60 uppercase tracking-wider flex h-full flex-col items-center space-y-2 focus:outline-none">
                                    <button wire:click="deleteSelected" type="button" class="focus:outline-none text-white w-16 text-xs py-2.5 px-3 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-sm flex items-center">{{ __('Delete') }}</button>
                                    
                                    <div class="w-full text-xs">{{ __('Select All') }}</div>
                                    <div>
                                        <input type="checkbox" wire:click="toggleSelectAll" @if(count($selected) === $this->results->total()) checked @endif class="form-checkbox mt-1 h-4 w-4 text-theme-color-green  border border-gray-300 text-theme-color-dark transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green  outline-none" />
                                    </div>
                                    

                                </div>
                            @else
                                <div class="table-cell overflow-hidden align-top">
                                    @isset($column['filterable'])
                                        @if( is_iterable($column['filterable']) )
                                            <div wire:key="{{ $index }}">
                                                @include('datatables::filters.select', ['index' => $index, 'name' => $column['label'], 'options' => $column['filterable']])
                                            </div>
                                        @else
                                            <div wire:key="{{ $index }}">
                                                @include('datatables::filters.' . ($column['filterView'] ?? $column['type']), ['index' => $index, 'name' => $column['label']])
                                            </div>
                                        @endif
                                    @endisset
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @endif
                    @forelse($this->results as $result)
                        
                        <div class="table-row p-1 divide-x divide- {{ isset($result->checkbox_attribute) && in_array($result->checkbox_attribute, $selected) ? 'bg-orange-100' : ($loop->even ? 'bg-gray-100' : 'bg-gray-50') }}">
                            @foreach($this->columns as $column)
                                @if($column['hidden'])
                                    @if($hideable === 'inline')
                                    <div class="table-cell w-5 overflow-hidden align-top"></div>
                                    @endif
                                @elseif($column['type'] === 'checkbox')
                                    @include('datatables::checkbox', ['value' => $result->checkbox_attribute])
                                @else
                                    <div class="px-6 py-2 truncate text-sm leading-5 text-theme-color-dark text-opacity-80 table-cell @if($column['align'] === 'right') text-right @elseif($column['align'] === 'center') text-center @else text-left @endif" style="max-width: 9em;">
                                        {!! $result->{$column['name']} !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @empty
                        <p class="p-3 text-lg text-teal-600">
                           {{ __("There's Nothing to show at the moment") }}
                        </p>
                    @endforelse
                </div>
            </div>
            @unless($this->hidePagination)
            <div class="rounded-lg rounded-t-none max-w-screen rounded-lg border-b border-theme-color-light bg-white">
                <div class="p-2 sm:flex items-center justify-between">
                    {{-- check if there is any data --}}
                    @if($this->results[1])
                        <div class="my-2 sm:my-0 flex items-center">
                            <select name="perPage" class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded outline-none" wire:model="perPage">
                                <option value="10">{{ __('10') }}</option>
                                <option value="25">{{ __('25') }}</option>
                                <option value="50">{{ __('50') }}</option>
                                <option value="100">{{ __('100') }}</option>
                                <option value="99999999">{{ __('All') }}</option>
                            </select>
                        </div>

                        <div class="my-4 sm:my-0">
                            <div class="lg:hidden">
                                <span class="space-x-2">{{ $this->results->links('datatables::tailwind-simple-pagination') }}</span>
                            </div>

                            <div class="hidden lg:flex justify-center">
                                <span>{{ $this->results->links('datatables::tailwind-pagination') }}</span>
                            </div>
                        </div>

                        <div class="flex justify-end text-theme-color-dark text-opacity-60 ">
                            {{ __('Results') }} {{ $this->results->firstItem() }} - {{ $this->results->lastItem() }} {{ __('of') }}
                            {{ $this->results->total() }}
                        </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
    @if($afterTableSlot)
    <div class="mt-8">
        @include($afterTableSlot)
    </div>
    @endif
        
</div>
<div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
            
            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
              {{ __('Warning') }}
            </h3>
            <div class="mt-2">
              <p class="text-sm text-theme-color-light-blue">
                {{ __('Are you sure you want continue? The data would be permanently removed. This action cannot be undone.') }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button id="confirmDelete" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
          {{ __('Confirm') }}
        </button>
        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          {{ __('Cancel') }}
        </button>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script type="text/javascript">
    var deleteModal = document.getElementById("deleteModal");
    deleteModal.classList.add('hidden');

    Livewire.on('showDeleteModalCall', (args) => {
        
        deleteModal.classList.remove('hidden');
    });

    document.querySelector(`#confirmDelete`).addEventListener(`click`, function () {
            window.livewire.emit('handleDelete');
        }
    );

</script>
@endpush