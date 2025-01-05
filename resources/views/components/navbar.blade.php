  <!-- navbar -->
  <nav class="navbar navbar-dark bg-dark  ">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="#home" class="nav-link">Home</a>


        @auth
        <a href="" class="nav-link">Welcome {{auth()->user()->name}}</a>

        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn-link border-none btn nav-link">Logout</button>
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