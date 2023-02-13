<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body class="bg-primary/5">
    <div class="container mx-auto h-screen flex flex-col">
        <!-- Header -->
        <header class="py-2 border-b border-black/10">
            <img src="{{asset('assets/img/logo-black.png')}}" alt="" class="inline h-14">
        </header>
        <!-- Main -->
        <main class="grow flex flex-col justify-center mx-auto gap-10">
            <div class="space-y-2">
                <h2 class="">@yield('code')</h2>
                <h1 class="text-5xl">@yield('title')</h1>
                <p class="text-xl leading-snug">@yield('message')</p>
            </div>
            <a href="/" class="w-fit btn-sm btn-outline-light flex items-center gap-2 group">
                <i class="ri-arrow-left-line me-2 group-hover:-translate-x-2 transition"></i>
                Back Home
            </a>
        </main>
    </div>
</body>
</html>