  @props(['randomBlogs'])

    <section class="container text-center" id="blogs">
      <h1 class="display-5 fw-bold mb-4">Blogs You May Like</h1>
    <div class="dropdown">
     <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Filter By Category
      </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>


      <form action="" class="my-3">
        <div class="input-group mb-3">
          <input
            type="text"
            autocomplete="false"
            class="form-control"
            placeholder="Search Blogs..."
          />
          <button
            class="input-group-text bg-primary text-light"
            id="basic-addon2"
            type="submit"
          >
            Search
          </button>
        </div>
      </form>
      <div class=" row ">

      @foreach ($randomBlogs as $blog)
       <div class="col-md-4 mb-4">
        <x-blog-card :blog="$blog" />

        </div>

         @endforeach
       
      
      </div>
    </section>