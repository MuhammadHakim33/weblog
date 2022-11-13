@include('admin.partials.head')
@include('admin.partials.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">@yield('title')</h1>
                    @yield('action')
                </div>
                @yield('content')
            </main>
        </div>
    </div>

@include('admin.partials.footer')