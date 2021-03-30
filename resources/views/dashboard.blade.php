<div>
    <div class="space-y-10">
        <div>
            <h3 class="text-lg leading-6 font-medium text-theme-color-dark">
                {{ __('Overview') }}
            </h3>

            <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <a class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-theme-color-light-blue truncate">{{ __('Current Appointments') }}</dt>
                        <dd class="mt-1 text-3xl font-semibold text-theme-color-dark">
                            <svg class="inline-block w-14 text-theme-color-green " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                           <span class="inline-block">{{ count($this->currentAppointments) }}</span>
                        </dd>
                    </div>
                </a>

                <a class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-sm font-medium text-theme-color-light-blue truncate">{{ __("Today's Appointments") }}</dt>
                        <dd class="mt-1 text-3xl font-semibold text-theme-color-dark">
                            <svg class="inline-block w-14 text-theme-color-light-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                           <span class="inline-block">{{ count($this->todayAppointments) }}</span>
                        </dd>
                    </div>
                </a>
            </div>
        </div>

        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ __('Recent Appointments') }}
            </h3>

            <div class="mt-2 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 space-y-6 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-theme-color-light rounded-lg">
                            <table class="min-w-full divide-y divide-theme-color-light">
                                <thead class="bg-theme-color-light-green">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        {{ __('Employee') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        {{ __('Client') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">
                                        {{ __('Amount') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">
                                        {{ __('Time Completed') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($recentAppointments as $appointment)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <p class="truncate w-72 text-theme-color-dark text-opacity-80 text-sm truncate group-hover:text-gray-900">
                                                   {{ $appointment->employee_name }} 
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <p class="text-theme-color-dark text-opacity-80 text-sm truncate group-hover:text-gray-900">
                                                    {{ $appointment->client_name }} 
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                                <p class="text-theme-color-dark text-opacity-80 text-sm truncate group-hover:text-gray-900">
                                                    {{ ((isset($appointment->price)) && ($appointment->price > 0)) ? config('currency')['symbol_native'] . $appointment->price : '' }} 
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                                <p class="text-sm text-theme-color-dark text-opacity-80">
                                                    {{ $appointment->finish_time }} 
                                                </p>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 text-center whitespace-no-wrap text-sm leading-5 text-theme-color-dark text-opacity-80" colspan="5">
                                                {{ __('No Recent Activity found...') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
