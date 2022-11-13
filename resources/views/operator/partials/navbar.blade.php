<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
        <strong>Dashboard Weblog</strong>
    </a>
    <div class="nav">
        <div class="nav-item">
            <form action="/admin/logout" method="POST">
                @csrf
                <button class="nav-link px-3 text-white-50 bg-dark btn btn-link" href="#">Logout</button>
            </form>
        </div>
        <div class="nav-item">
            <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>