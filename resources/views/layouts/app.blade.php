<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/init-alpine.js') }}"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384MCw98/SFnGE8fJT3GXwEOngsV7Zt2&NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

</head>
<body>
<div
    class="flex h-screen bg-gray-50"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    <!-- Desktop sidebar -->
    @include('layouts.navigation')
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    @include('layouts.navigation-mobile')
    <div class="flex flex-col flex-1 w-full">
        @include('layouts.top-menu')
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                <h2 class="my-6 text-2xl font-semibold text-gray-700">
                    {{ $header }}
                </h2>

                {{ $slot }}
            </div>
        </main>
    </div>
{{--    @yield('content')--}}
</div>

<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@yield('scripts')
</body>
</html>
