<aside id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse bg-white">
    <div class="position-sticky pt-3 sidebar-sticky">
        <!-- Brand -->
        <div class="container-fluid">
            <img src="{{ asset('assets/img/logo-black.png') }}" alt="Weblog" height="40">
        </div>
        <!-- Profile Card -->
        <div class="container-fluid py-4">
            @include('operator.partials.profile-card')
        </div>
        <!-- Navigation -->
        <nav class="nav flex-column">
            <a class="nav-link" aria-current="page" href="/dashboard">
                <i class="ri-home-line"></i>
                <P>Dashboard</P>
            </a>
            <!-- Heading -->
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Posts</span>
            </h6>
            <a class="nav-link" aria-current="page" href="/posts">
                <i class="ri-article-line"></i>
                <P>My Posts</P>
            </a>
            <!-- Heading -->
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Account</span>
            </h6>
            <!-- Logout -->
            <form action="/logout" method="POST">
                @csrf
                <button class="nav-link btn btn-link" href="#">
                <i class="ri-logout-box-r-line"></i>Logout</button>
            </form>
        </nav>
    </div>
</aside>