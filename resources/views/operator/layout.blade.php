@include('operator.partials.head')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @include('operator.partials.sidebar')
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

@include('operator.partials.footer')