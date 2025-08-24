<!-- Responsive Navbar -->
<nav class="bg-dark text-white">
    <div class="container mx-auto flex items-center justify-between py-1 ">
        <a class="navbar-brand " href="/">Thura Blog</a>
        <!--mobile -->
        <button id="navbar-toggle" class="md:hidden focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <!-- Nav Links -->
        <div id="navbar-menu"
            class="hidden md:flex flex-col md:flex-row md:items-center gap-2 md:gap-4 w-full md:w-auto  md:mt-0 bg-dark md:bg-transparent p-4 md:p-0  absolute md:static left-0 top-10 md:top-auto z-50">
            <a href="/" class="nav-link">Home</a>
            @auth
                @can('admin')
                    <a href="/admin/dashboard/index" class="nav-link">Dashboard</a>
                @endcan
                <a href="#" class="nav-link">{{ auth()->user()->name }}</a>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="btn-link border-none ring-0 nav-link">Logout</button>
                </form>
            @else
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @endauth
            <a href="#blogs" class="nav-link">Blogs</a>
            <a href="#subscribe" class="nav-link">Subscribe</a>
            @auth
                <img src="{{ auth()->user()->avatar ?? '/default-avatar.png' }}"
                    class="rounded-full object-cover w-9 h-9 border" alt="avatar">
            @endauth
        </div>
    </div>
</nav>


<script>
    document.getElementById('navbar-toggle').onclick = function() {
        const menu = document.getElementById('navbar-menu');
        menu.classList.toggle('hidden');
    }
</script>
