<x-layout>

<x-slot name="title">
    <title>All Blogs</title>
</x-slot>

@foreach($blogs as $blog)
<div class="">
        <h1>
        <a href="/blogs/{{$blog->slug}}"> {{$blog->title}} </a>
    </h1>

    <h3>
        {{$blog->intro}}
    </h3>

    <h3>
        published at-{{$blog->date}}
    </h3>


   <p>
      {!!$blog->body!!}
   </p>

</div>
@endforeach

</x-layout>




   
