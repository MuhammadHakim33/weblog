<!DOCTYPE html>
<html lang="en">
<head>
    @include('operator.partials.head')
</head>
<body class="bg-primary/5" x-data="{sidebar: false}">

    @yield('sidebar')

    @yield('content')

    @include('operator.partials.script')
</body>
</html>