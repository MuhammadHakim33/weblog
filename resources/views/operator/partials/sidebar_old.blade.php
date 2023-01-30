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
                Dashboard
            </a>
            <!-- Heading -->
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Posts</span>
            </h6>
            <a class="nav-link" aria-current="page" href="/posts">
                <i class="ri-article-line"></i>
                All Posts
            </a>
            <a class="nav-link" aria-current="page" href="/posts/drafts">
                <i class="ri-draft-line"></i>
                Drafts
            </a>
            @can('admin')
                <a class="nav-link" aria-current="page" href="/categories">
                    <i class="ri-file-list-line"></i>
                    Categories
                </a>
                <a class="nav-link" aria-current="page" href="/comments">
                    <i class="ri-discuss-line"></i>
                    Comments
                </a>
                <!-- Heading -->
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Users</span>
                </h6>
                <a class="nav-link" aria-current="page" href="/authors">
                    <i class="ri-pencil-line"></i>
                    Autors
                </a>
                <a class="nav-link" aria-current="page" href="/subscribers">
                    <i class="ri-team-line"></i>
                    Subscribers
                </a>
            @endcan
            <!-- Heading -->
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Account</span>
            </h6>
            <a class="nav-link" aria-current="page" href="/profile">
                <i class="ri-user-line"></i>
                Profile
            </a>
            <!-- Logout -->
            <form action="/logout" method="POST">
                @csrf
                <button class="nav-link btn btn-link" href="#">
                <i class="ri-logout-box-r-line"></i>Logout</button>
            </form>
        </nav>
    </div>
</aside>