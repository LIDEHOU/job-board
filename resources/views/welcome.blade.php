<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Job board') }}</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="font-sans text-gray-900 text-3xl antialiased">
            test
              {{-- {{ $slot }} --}}
        </div>
    </body>
</html>
