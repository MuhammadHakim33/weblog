@include('operator.partials.head')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @include('operator.partials.sidebar')
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 p-0 pb-4">
                <!-- Toggle Menu Sidebar Responsive -->
                <header class="px-2 pt-2 d-flex justify-content-end border-bottom d-md-none">
                    <button id="sidebar-toggler" class="sidebar-toggler d-md-none collapsed btn btn-light btn-sm " type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="ri-menu-line ri-xl"></i></button>
                </header>    

                @yield('content')
            </main>
        </div>
    </div>

@include('operator.partials.footer')