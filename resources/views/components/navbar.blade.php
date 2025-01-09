  <!-- navbar -->
  <nav class="navbar navbar-dark bg-dark  ">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="/" class="nav-link">Home</a>


        @auth
        @can('admin')
        <a href="/admin/blog/create" class="nav-link">Dashboard</a>
        @endcan
        <a href="" class="nav-link">{{auth()->user()->name}}</a>

        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn-link border-none  ring-0 nav-link">Logout</button>
        </form>
        @else
        <a href="register" class="nav-link">Register</a>
        <a href="login" class="nav-link">Login</a>
        @endauth

        <a href="#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>

        @auth


        <img
          src="{{auth()->user()->avatar}}"

          class="rounded-circle  object-cover w-9 h-9"
          alt="">
        @endauth
      </div>
    </div>
  </nav>