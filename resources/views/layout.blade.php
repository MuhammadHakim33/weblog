<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="bg-primary/5" x-data="{sidebar: false}">

    @yield('sidebar')

    @yield('content')

    @include('partials.script')
</body>
</html>