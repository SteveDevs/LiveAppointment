<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('company') }} | {{ $title }}</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <livewire:styles />
        @stack('stylesheets')

    </head>
    <body class="antialiased font-sans" id="body">
       
        <div class="min-h-screen bg-gray-50">
            {{ $slot }}
        </div>

        @livewireScripts
        
        
        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
    </body>

    <script type="text/javascript">
        window.addEventListener("load", function(){
            let button = document.querySelector("#animate-page");

            // Click the button

            if (button) {
              button.click();
            }
            else {
              console.log("Error");
            }
        });
        
    </script>
   
</html>
    