@props(['blogs'])


<section class="container text-center" id="blogs">
  <h1 class="display-5 fw-bold mb-4">Blogs</h1>

  <x-cateogry-dropdown />


  <x-search />
  <div class=" row ">

    @forelse($blogs as $blog)
    <div class="col-md-4 mb-4">
      <x-blog-card :blog="$blog" />
    </div>
    @empty
    <p class="text-center text-2xl">No Blogs Found</p>
    @endforelse()


    {{$blogs->Links()}}



  </div>
</section>