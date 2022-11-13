<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{($title == 'Dashboard') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <i class="ri-home-line"></i>
                    <P>Dashboard</P>
                </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted text-uppercase">
                <span>Posts</span>
            </h6>
            <li class="nav-item">
                <a class="nav-link {{($title == 'Posts') ? 'active' : '' }}" aria-current="page" href="/admin/posts">
                    <i class="ri-article-line"></i>
                    <P>All Posts</P>
                </a>
            </li>
        </ul>
    </div>
</nav>