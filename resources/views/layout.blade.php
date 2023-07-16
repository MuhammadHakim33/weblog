<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')

    @livewireStyles
</head>
<body class="bg-primary/5" x-data="{ sidebar: false }">

    @yield('sidebar')

    @yield('content')

    @include('partials.script')

    @livewireScripts
</body>
</html>