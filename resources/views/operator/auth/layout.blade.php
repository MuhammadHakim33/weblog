@include('operator.partials.head')

<div class="container">
    <!-- Header -->
    <header id="auth-header" class="py-2 d-flex align-items-center border-bottom">
        <img src="{{ asset('assets/img/logo-black.png') }}" alt="Weblog" height="50" class="me-2">
        <p class="mb-0"><span class="badge text-bg-dark">Operator only</span></p>
    </header>

    <!-- Form -->
    <main id="auth-form" class="card my-5 mx-auto bg-transparent border-0">
        <div class="card-body">
            <h3 class="card-title mb-4">@yield('title')</h3>
            @yield('form')
        </div>

        <!-- Other action -->
        <hr class="mx-3">
        @yield('btn-action')
    </main>
</div>

@include('operator.partials.footer')