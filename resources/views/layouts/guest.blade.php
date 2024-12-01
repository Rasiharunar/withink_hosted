<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Inline style for responsive background image */
        body {
            background-image: url('path/to/your/image.jpg'); /* Replace with your image URL */
            background-size: cover; /* Cover the entire area */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            height: 100vh; /* Make sure the body takes up the full height of the viewport */
        }
    </style>
</head>

<body class="font-sans text-customBlue ">
    <div class=" flex items-center justify-center min-h-screen bg-primary-500 dark:bg-primary">
        <div class="text-center">
            <h1 class="text-4xl mb-6" href="/">
                WELCOME
            </h1>


            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-primary dark:bg-primary-100 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
</body>

</html>
