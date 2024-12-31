@props(['blog'])

<div class="card">
  <img
    src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
    class="card-img-top"
    alt="..." />
  <div class="card-body">
    <h3 class="card-title "><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h3>
    <p class="fs-6  ">
      <a href="/?username={{$blog->author->username}}{{request('search')?'&search='.request('search') : ''}}
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
    <p class="card-text">
      {{$blog->body}}
    </p>
    <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
  </div>
</div>