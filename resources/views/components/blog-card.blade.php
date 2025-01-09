@props(['blog'])

<div class=" card h-[600px] rounded-sm ">
  <img
    src="/storage/{{$blog->thumbnail}}"
    class="card-img-top"
    alt="..." />
  <div class="card-body">
    <h3 class="card-title fs-4  line-clamp-1  "><a class="text-decoration-none text-dark" href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h3>
    <p class="fs-5   ">
      <a class="text-decoration-none" href="/?username={{$blog->author->username}}{{request('search')?'&search='.request('search') : ''}}
         {{request('category')?'&category='.request('category') : ''}}">
        Author Name- {{$blog->author->name}}
      </a>

    </p>
    <span class="text-secondary"> {{$blog->created_at->diffForHumans()}}</span>
    <div class="tags my-3">
      <span class="badge bg-primary"><a class="dropdown-item" href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></span>
      <span class="badge bg-primary"><a class="dropdown-item" href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></span>
      <span class="badge bg-primary"><a class="dropdown-item" href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></span>

    </div>
    <p class="card-text line-clamp-4">
      {!!$blog->intro!!}
    </p>
    <a href="/blogs/{{$blog->slug}}" class="btn btn-primary mt-4">Read More</a>
  </div>
</div>