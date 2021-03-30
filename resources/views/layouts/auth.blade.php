@extends('layouts.base')

@section('body')
    @if(request()->routeIs('login')) 
       <div id="login-page" class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
       <style>
                #login-page{
                    width: 100%;
                    height: 100%;
                    background: url("/images/time2.jpg");
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover; 
                }
            </style>
    @elseif(request()->routeIs('register')) 
        <div id="login-page" class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
       <style>
                #login-page{
                    width: 100%;
                    height: 100%;
                    background: url("/images/time1.jpg");
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover; 
                }

                #logo-text{
                    
                }
            </style>
    @else 
        <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">             
    @endif
    
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>

@endsection
