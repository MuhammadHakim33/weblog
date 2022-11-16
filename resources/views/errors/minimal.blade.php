<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/operator.css') }}">
    <title>@yield('title')</title>
</head>
<body class="container py-4">
    <!-- Header -->
    <header class="border-bottom pb-3">
        <img src="{{ asset('assets/img/logo-black.png') }}" alt="Weblog" height="40">
    </header>
    <!-- Main -->
    <main class="d-flex flex-column" id="error-body">
        <div class="message mb-4">
            <h1 class="lh-base">@yield('code')</h1>
            <h3 class="lh-base">@yield('message')</h3>
        </div>
        <div class="action">
            <a href="/" type="button" class="btn btn-outline-dark d-flex justify-content-center">
                <i class="ri-arrow-left-line me-2 top-50 start-50"></i>
                Back Home
            </a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>