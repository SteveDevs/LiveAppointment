<div>
    <div class="pb-9">
        <h3 class="text-lg leading-6 font-medium text-theme-color-dark text-opacity-80">
        {{ $client->name }}
    </h3>
    </div>
    <div 
    x-data="{
      openTab: 1,
      activeClasses: 'border-l border-t border-r rounded-t text-blue-700',
      inactiveClasses: 'text-blue-500 hover:text-blue-800'
    }" 
    class="p-6"
  >
    <ul class="flex border-b">
        <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
        <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#"><span class="text-theme-color-green hover:text-theme-color-dark">{{ __('Calendar') }}</span></a>
      </li>
      <li @click="openTab = 2" :class="{ '-mb-px': openTab === 1 }" class="mr-1">
        <a :class="openTab === 2 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
          <span class="text-theme-color-green hover:text-theme-color-dark">{{ __('Today') }}</span>
        </a>
      </li>
      
    </ul>
    <div class="w-full pt-4">
      <div x-show="openTab === 2">{{ __('Today') }}
        <livewire:admin.clients.appointments.client-appointment-today :modelResource="$this->employees" :modelEvent="$this->appointments_day">
      </div>

      <div x-show="openTab === 1">
        <livewire:admin.clients.appointments.client-appointment-calendar :userId="$this->client->id"
        :gridStartsAt="$this->currentMonth"
        :gridEndsAt="$this->endCurrentMonth" > 

      </div>
          
    </div>
  </div>
</div>
