<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')

    @livewireStyles

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="bg-primary/5" x-data="{ sidebar: false }">

    @yield('sidebar')

    @yield('content')

    @include('partials.script')

    @livewireScripts
</body>
</html>