<div x-data="{animate: false}">
   <span id="animate-page" @click="animate = (animate) ? false : true" class="hidden">
   </span>
   <div x-show="animate" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
      <x-layouts.base :title="$title">
         <div
            x-cloak
            x-data="{ sidebarOpen: false }"
            @keydown.window.escape="sidebarOpen = false"
            class="h-screen flex overflow-hidden"
            >
            <div x-show="sidebarOpen" class="md:hidden">
               <div
                  @click="sidebarOpen = false"
                  x-show="sidebarOpen"
                  x-transition:enter-start="opacity-0"
                  x-transition:enter-end="opacity-100"
                  x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0"
                  class="fixed inset-0 z-30 transition-opacity ease-linear duration-300"
                  >
                  <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
               </div>
               <div class="fixed inset-0 flex z-40">
                  <div
                     x-show="sidebarOpen"
                     x-transition:enter-start="-translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="-translate-x-full"
                     class="flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-theme-color-green transform ease-in-out duration-300"
                     >
                     <div class="absolute top-0 right-0 -mr-14 p-1">
                        <button
                           x-show="sidebarOpen"
                           @click="sidebarOpen = false"
                           class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600"
                           >
                           <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                           </svg>
                        </button>
                     </div>
                     <div class="flex-shrink-0 flex items-center px-4">
                        <a href="{{ url('/') }}">
                            <x-logo class="w-16 ml-6 text-theme-color-dark" inner-color="#65CCB8" />
                        </a>
                     </div>
                     <div class="mt-5 flex-1 h-0 overflow-y-auto ">
                        <nav class="flex-1 bg-theme-color-green ">
                           <a href="{{ route('dashboard') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('dashboard')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('dashboard'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"/>
                              </svg>
                              <br>
                              <span class="block">{{ __('Dashboard') }}</span>
                           </a>
                           @can('permission_access')
                           <a href="{{ route('admin.permissions') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('admin.permissions')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('admin.permissions'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                              </svg>
                              {{ __('Permissions') }}
                           </a>
                           @endcan
                           @can('role_access')
                           <a href="{{ route('admin.roles') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('admin.roles')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('admin.roles'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>
                              {{ __('Roles') }}
                           </a>
                           @endcan
                           @can('user_access')
                           <a href="{{ route('admin.users') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('admin.users')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('admin.users'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                 <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                              </svg>
                              {{ __('Users') }}
                           </a>
                           @endcan
                           @can('service_access')
                           <a href="{{ route('admin.services') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('admin.services')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('admin.services'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              {{ __('Services') }}
                           </a>
                           @endcan
                           @can('employee_category_access')
                           <a href="{{ route('admin.employee-categories') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('admin.employee-categories')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('admin.employee-categories'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                              </svg>
                              {{ __('Employee Categories') }}
                           </a>
                           @endcan
                           @can('employee_access')
                           <a href="{{ route('admin.employees') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('admin.employees')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('admin.employees'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                              </svg>
                              {{ __('Employees') }}
                           </a>
                           @endcan
                           @can('client_access')
                           <a href="{{ route('admin.clients') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('admin.clients')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('admin.clients'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                              </svg>
                              {{ __('Clients') }}
                           </a>
                           @endcan
                           @can('appointment_access')
                           <a href="{{ route('admin.appointments') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('admin.appointments')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('admin.appointments'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                              </svg>
                              {{ __('Appointments') }}
                           </a>
                           @endcan
                           @can('setting_edit')
                           <a href="{{ route('admin.settings.edit') }}" class="group pt-5 flex w-full items-center px-10 py-4 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-150 
                              hover:bg-gray-700 
                              @if(request()->routeIs('admin.settings.edit')) 
                              text-white bg-theme-color-dark   
                              @else text-white hover:bg-theme-color-dark 
                                
                              @endif">
                              <svg class="block mr-3 h-6 w-6 transition ease-in-out duration-150 
                                 @if(request()->routeIs('admin.settings.edit'))
                                 text-white
                                 @else
                                 text-white 
                                 @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              {{ __('Settings') }}
                           </a>
                           @endcan
                        </nav>
                     </div>
                  </div>
                  <div class="flex-shrink-0 w-14"></div>
               </div>
            </div>
            <div class="hidden md:flex md:flex-shrink-0">
               <div class="flex flex-col bg-theme-color-green">
                  <div class="flex items-center flex-shrink-0 ">
                        <a href="{{ url('/') }}">
                            <x-logo class="w-14 ml-4 mt-3 text-theme-color-dark" inner-color="#65CCB8" />
                        </a>
                  </div>
                  <div class="mt-5 overflow-y-auto ">
                     <nav class="flex-1 ">
                        <a href="{{ route('dashboard') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('dashboard')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('dashboard')) 
                            text-theme-color-light
                           @else

                           @endif
                           " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"/>
                           </svg>
                           <br>
                           <span class="block">{{ __('Dashboard') }}</span>
                        </a>
                        @can('permission_access')
                        <a href="{{ route('admin.permissions') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('admin.permissions')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('admin.permissions')) 
                            text-theme-color-light
                           @else

                           @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                           </svg>
                           {{ __('Permissions') }}
                        </a>
                        @endcan
                        @can('role_access')
                        <a href="{{ route('admin.roles') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('admin.roles')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('admin.roles')) 
                            text-theme-color-light
                           @else

                           @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                           </svg>
                           {{ __('Roles') }}
                        </a>
                        @endcan
                        @can('user_access')
                        <a href="{{ route('admin.users') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('admin.users')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('admin.users')) 
                            text-theme-color-light
                           @else

                           @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                           </svg>
                           {{ __('Users') }}
                        </a>
                        @endcan
                        @can('service_access')
                        <a href="{{ route('admin.services') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('admin.services')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('admin.services')) 
                            text-theme-color-light
                           @else

                           @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                           </svg>
                           {{ __('Services') }}
                        </a>
                        @endcan
                        @can('employee_category_access')
                        <a href="{{ route('admin.employee-categories') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('admin.employee-categories')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('admin.employee-categories')) 
                            text-theme-color-light
                           @else

                           @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                           </svg>
                           {{ __('Employee Categories') }}
                        </a>
                        @endcan
                        @can('employee_access')
                        <a href="{{ route('admin.employees') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('admin.employees')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('admin.employees')) 
                            text-theme-color-light
                           @else

                           @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                           </svg>
                           {{ __('Employees') }}
                        </a>
                        @endcan
                        @can('client_access')
                        <a href="{{ route('admin.clients') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('admin.clients')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('admin.clients')) 
                            text-theme-color-light
                           @else

                           @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                           </svg>
                           {{ __('Clients') }}
                        </a>
                        @endcan
                        @can('appointment_access')
                        <a href="{{ route('admin.appointments') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('admin.appointments')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('admin.appointments')) 
                            text-theme-color-light
                           @else

                           @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                           </svg>
                           {{ __('Appointments') }}
                        </a>
                        @endcan
                        @can('setting_edit')
                        <a href="{{ route('admin.settings.edit') }}" class="group flex w-full items-center px-3 py-5 text-sm leading-5 font-medium  focus:outline-none  transition ease-in-out duration-150 
                        @if(request()->routeIs('admin.settings.edit')) 
                           text-theme-color-light bg-theme-color-dark 
                        @else 
                            text-theme-color-light  
                            hover:bg-theme-color-dark  
                        @endif">
                           <svg class="block mr-3 h-6 w-6 text-theme-color-light transition ease-in-out duration-150
                           @if(request()->routeIs('admin.settings.edit')) 
                            text-theme-color-light
                           @else

                           @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                           </svg>
                           {{ __('Settings') }}
                        </a>
                        @endcan
                     </nav>
                  </div>
               </div>
            </div>
            <div class="flex flex-col w-0 flex-1 overflow-hidden">
               <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
                  <button @click.stop="sidebarOpen = true" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 md:hidden">
                     <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                     </svg>
                  </button>
                  <div class="flex-1 px-4 flex justify-between">
                     <div class="flex-1 flex">
                        <div class="w-full flex md:ml-0">
                           <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                           </div>
                        </div>
                     </div>
                     <div class="ml-4 flex items-center md:ml-6">
                        
                        @livewire('dropdowns.languages')
                        
                        <div x-data="{ open: false }" @click.away="open = false" class="ml-3 relative">
                           <div >
                              <button @click="open = !open" class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-outline">
                                 <svg class="block mr-3 h-6 w-6 text-gray-500 hover:text-gray-700 group-focus:text-gray-300 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                 </svg>
                                 <p class="block">{{ auth()->user()->name }}</p>
                              </button>
                           </div>
                           <div
                              x-show="open"
                              x-transition:enter="transition ease-out duration-100"
                              x-transition:enter-start="transform opacity-0 scale-95"
                              x-transition:enter-end="transform opacity-100 scale-100"
                              x-transition:leave="transition ease-in duration-75"
                              x-transition:leave-start="transform opacity-100 scale-100"
                              x-transition:leave-end="transform opacity-0 scale-95"
                              class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg"
                              >
                              <div class="pb-1 rounded-md bg-white shadow-xs">
                                 <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">{{ __('Your Profile') }}</a>
                                 <livewire:auth.logout-component />
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <main x-data x-init="$el.focus()" class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none bg-white" tabindex="0">
                  <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                     {{ $slot }}
                  </div>
               </main>
            </div>
         </div>
         <x-notification.snack />
      </x-layouts.base>
   </div>
</div>