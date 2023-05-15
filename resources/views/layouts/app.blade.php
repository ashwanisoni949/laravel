<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin Panel') }}</title>
    @include('common.headerlink')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <div class="page-wrapper toggled">
            @include('common.sidebar')
            <main class="page-content bg-light">
                @include('common.topnav')
                <main>
                    {{ $slot }}
                </main>
                @include('common.footer')
            </main>
        </div>
        <x-modal />
        @include('common.script')
        @stack('scripts')
    </div>
</body>
</html>
