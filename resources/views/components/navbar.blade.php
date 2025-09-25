<nav class="bg-dark   fixed top-0 left-0 right-0 z-50 transition-shadow duration-300" id="site-navbar">
    <div class="container mx-auto flex items-center justify-between py-1 ">
        <a class="navbar-brand text-white hover:text-blue-400 transition-colors" href="/">Thura Blog</a>
        <!--mobile -->
        <button id="navbar-toggle" class="lg:hidden focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <!-- Nav Links -->
        <div id="navbar-menu"
            class="hidden lg:flex flex-col md:flex-row md:items-center gap-2 md:gap-4 w-full md:w-auto  md:mt-0 bg-dark md:bg-transparent p-4 md:p-0  absolute md:static left-0 top-10 md:top-auto z-50">
            <a href="{{ route('home') }}"
                class="nav-link   transition-colors hover:text-blue-400 {{ request()->routeIs('home') ? 'text-blue-500 font-semibold' : 'text-white' }}">Home</a>
            @auth
                @can('admin')
                    <a href="{{ route('admin.dashboard.index') }}"
                        class="nav-link  transition-colors hover:text-blue-400 {{ request()->routeIs('admin.*') ? 'text-blue-500 font-semibold' : 'text-white' }}">Dashboard</a>
                @endcan
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="btn-link border-none ring-0 nav-link  transition-colors hover:text-blue-400">Logout</button>
                </form>
            @else
                <a href="{{ route('register.create') }}"
                    class="nav-link  transition-colors hover:text-blue-400 {{ request()->routeIs('register.*') ? 'text-blue-500 font-semibold' : 'text-white' }}">Register</a>
                <a href="{{ route('login.create') }}"
                    class="nav-link  transition-colors hover:text-blue-400 {{ request()->routeIs('login.*') ? 'text-blue-500 font-semibold' : 'text-white' }}">Login</a>
            @endauth
            <a href="/blogs"
                class="nav-link  transition-colors hover:text-blue-400 {{ request()->routeIs('blogs.*') || request()->is('blogs*') ? 'text-blue-500 font-semibold' : 'text-white' }}">Blogs</a>
            <a href="{{ route('subscribe') }}"
                class="nav-link  transition-colors hover:text-blue-400 {{ request()->routeIs('subscribe') ? 'text-blue-500 font-semibold' : 'text-white' }}">Subscribe</a>
            @auth
                <a href="{{ route('profile.show') }}" class="nav-link ">
                    <img src="{{ auth()->user()->avatar }}"
                        class="rounded-full object-cover w-9 h-9 border transition ring-transparent hover:ring-1 hover:ring-blue-400"
                        alt="avatar">
                </a>
            @endauth
        </div>
    </div>
</nav>


<script>
    (function() {
        const toggle = document.getElementById('navbar-toggle');
        const menu = document.getElementById('navbar-menu');
        if (toggle && menu) {
            toggle.onclick = function() {
                menu.classList.toggle('hidden');
            }
        }

        const navbar = document.getElementById('site-navbar');
        if (!navbar) return;
        const addShadow = () => navbar.classList.add('shadow-lg');
        const removeShadow = () => navbar.classList.remove('shadow-lg');
        const onScroll = () => {
            if (window.scrollY > 4) {
                addShadow();
            } else {
                removeShadow();
            }
        };
        onScroll();
        window.addEventListener('scroll', onScroll, {
            passive: true
        });
    })();
</script>
