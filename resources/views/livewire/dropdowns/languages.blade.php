<script type="text/javascript">
    const languages = JSON.parse("{{ $languages }}".replace(/&quot;/g,'"'));
    const options = JSON.parse("{{ $options }}".replace(/&quot;/g,'"'));
</script>
<div class="relative inline-block text-left">
      <div
         x-data="select({ data: languages, options} )"
         x-init="init()"
         @click.away="closeListbox()"
         @keydown.escape="closeListbox()"
         class="relative"
         >
         <span class="inline-block">
            <button
               x-ref="button"
               @click="toggleListboxVisibility()"
               :aria-expanded="open"
               aria-haspopup="listbox"
               class="relative z-0 mt-4 py-2 pl-3 pr-10 text-left  bg-white border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-1 px-4 mb-3 sm:text-sm sm:leading-5 w-40"
               >
               <span
                  x-show="! open"
                  x-text="value in options ? options[value] : placeholder"
                  :class="{ 'text-gray-500': ! (value in options) }"
                  class=""
                  ></span>
               <input
               x-ref="search"
               x-show="open"
               x-model="search"
               @keydown.enter.stop.prevent="selectOption()"
               @keydown.arrow-up.prevent="focusPreviousOption()"
               @keydown.arrow-down.prevent="focusNextOption()"
               type="search"
               class="relative h-8 right-0 top-0 fborder border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green focus:ring-opacity-20 focus:border-theme-color-light-green rounded w-28"
               />
               <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                     <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                  </svg>
               </span>
            </button>
         </span>
         <div
            x-show="open"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-cloak
            class="absolute z-10 mt-4 bg-white rounded-md shadow-lg"
            >
            <ul
            x-ref="listbox"
            @keydown.enter.stop.prevent="selectOption()"
            @keydown.arrow-up.prevent="focusPreviousOption()"
            @keydown.arrow-down.prevent="focusNextOption()"
            role="listbox"
            :aria-activedescendant="focusedOptionIndex ? name + 'Option' + focusedOptionIndex : null"
            tabindex="-1"
            class="py-1 overflow-auto text-base leading-6 rounded-md shadow-xs max-h-60 focus:outline-none sm:text-sm sm:leading-5"
            >
            <template x-for="(key, index) in Object.keys(options)" :key="index">
               <li
               :id="name + 'Option' + focusedOptionIndex"
               @click="selectOption()"
               @mouseenter="focusedOptionIndex = index"
               @mouseleave="focusedOptionIndex = null"
               role="option"
               :aria-selected="focusedOptionIndex === index"
               :class="{ 'text-white bg-theme-color-green': index === focusedOptionIndex, 'text-theme-color-dark': index !== focusedOptionIndex }"
               class="relative py-2 pl-3 text-theme-color-dark  cursor-default select-none pr-9"
               >
               <span x-text="Object.values(options)[index]"
                  :class="{ 'font-semibold': index === focusedOptionIndex, 'font-normal': index !== focusedOptionIndex }"
                  class="block font-normal truncate"
                  ></span>
               <span
                  x-show="key === value"
                  :class="{ 'text-white': index === focusedOptionIndex, 'text-theme-color-light-green': index !== focusedOptionIndex }"
                  class="absolute inset-y-0 right-0 flex items-center pr-4 text-theme-color-light-green"
                  >
                  <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"/>
                  </svg>
               </span>
               </li>
            </template>
            <div
               x-show="! Object.keys(options).length"
               x-text="emptyOptionsMessage"
               class="px-3 py-2 text-theme-color-dark  cursor-default select-none"></div>
            </ul>
         </div>
      </div>

</div>
@push('scripts')
<script>
    const locale = "{{ $preChosenIndex }}";

    function select(config) {
       return {
           data: config.data,
   
           emptyOptionsMessage: config.emptyOptionsMessage ?? 'No results match your search.',
   
           focusedOptionIndex: null,
   
           name: config.name,
   
           open: false,
   
           options: {},
   
           placeholder: config.placeholder ?? 'Select an option',
   
           search: '',
   
           value: config.value,
   
           closeListbox: function () {
               this.open = false
   
               this.focusedOptionIndex = null
   
               this.search = ''
           },
   
           focusNextOption: function () {
               if (this.focusedOptionIndex === null) return this.focusedOptionIndex = Object.keys(this.options).length - 1
   
               if (this.focusedOptionIndex + 1 >= Object.keys(this.options).length) return
   
               this.focusedOptionIndex++
   
               this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                   block: "center",
               })
           },
   
           focusPreviousOption: function () {
               if (this.focusedOptionIndex === null) return this.focusedOptionIndex = 0
   
               if (this.focusedOptionIndex <= 0) return
   
               this.focusedOptionIndex--
   
               this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                   block: "center",
               })
           },
   
           init: function () {
               this.options = this.data
   
               if (!(this.value in this.options)) this.value = null
   
               this.$watch('search', ((value) => {
                   if (!this.open || !value) return this.options = this.data
   
                   this.options = Object.keys(this.data)
                       .filter((key) => this.data[key].toLowerCase().includes(value.toLowerCase()))
                       .reduce((options, key) => {
                           options[key] = this.data[key]
                           return options
                       }, {})
               }))

                this.value = Object.keys(this.options)[locale];
           },
   
           selectOption: function () {
               if (!this.open) return this.toggleListboxVisibility()
   
               this.value = Object.keys(this.options)[this.focusedOptionIndex]
                window.livewire.emit('goToLangUrl', this.value);
               //this.closeListbox()
           },
   
           toggleListboxVisibility: function () {
               if (this.open) return this.closeListbox()
   
               this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)
   
               if (this.focusedOptionIndex < 0) this.focusedOptionIndex = 0
   
               this.open = true
   
               this.$nextTick(() => {
                   this.$refs.search.focus()
   
                   this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                       block: "nearest"
                   })
               })
           },
       }
   }
</script>
@endpush