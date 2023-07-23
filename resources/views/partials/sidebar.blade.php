<aside class="w-full h-screen md:w-[15rem] px-4 py-4 z-10 bg-primary fixed border-r space-y-5 text-white box-border hidden md:flex flex-col justify-between" :class="{ 'hidden': !sidebar }">
    <div>
        <!-- Brand -->
        <div class="flex justify-between items-center">
            <img src="{{ asset('assets/img/logo-white.png') }}" alt="" class="inline h-12">
            <button @click="sidebar = false" class="btn md:hidden flex items-center"><i class="ri-close-line ri-xl"></i></button>
        </div>
        <!-- Navigation -->
        <nav class="flex flex-col min-h-0 mt-4">
            <a href="/dashboard" class="nav-link">
                <i class="ri-dashboard-line mr-2"></i>
                Dashboard
            </a>
            <h5 class="nav-heading">POSTS</h5>
            <a href="/posts" class="nav-link">
                <i class="ri-article-line mr-2"></i>
                Posts
            </a>
            <a href="/posts/drafts" class="nav-link">
                <i class="ri-draft-line mr-2"></i>
                Drafts
            </a>
            @can('admin')
            <a href="/categories" class="nav-link">
                <i class="ri-file-list-line mr-2"></i>
                Categories
            </a>
            @endcan
            <a href="/comments" class="nav-link">
                <i class="ri-discuss-line mr-2"></i>
                Comments
            </a>
            @can('admin')
            <h5 class="nav-heading">USERS</h5>
            <a href="/authors" class="nav-link">
                <i class="ri-pencil-line mr-2"></i>
                Authors
            </a>
            <a href="/subscribers" class="nav-link">
                <i class="ri-team-line mr-2"></i>
                Subscribers
            </a>
            @endcan
        </nav>
    </div>
    <!-- Profile Card -->
    <div x-cloak class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center bg-primary w-full">
            <img src="{{ auth()->user()->avatar }}" alt="" class="inline h-10 rounded-sm" loading="lazy">
            <div class="text ml-2 text-left">
                <h5 class="capitalize">{{auth()->user()->name}}</h5>
                <p class="opacity-80 text-sm mt-1 capitalize">{{auth()->user()->userRole->level}}</p>
            </div>
        </button>
        <div x-show="open" @click.outside="open = false" class="absolute bottom-20 left-0 right-0 rounded border bg-white shadow-lg text-black">
            <a href="/profile" class="py-2 px-4 text-sm hover:bg-primary/10 flex gap-2 items-center justify-between">
                Profile
                <i class="ri-user-line"></i>
            </a>
            <hr>
            <!-- Logout -->
            <form action="/logout" method="POST">
                @csrf
                <button class="w-full py-2 px-4 text-sm hover:bg-red-700/10 text-red-700 flex gap-2 items-center justify-between">
                    Logout
                    <i class="ri-logout-box-r-line"></i>
                </button>
            </form>
        </div>
    </div>
</aside>