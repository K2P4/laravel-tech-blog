@props(['comments'])



<section class="container">

    <h5 class="my-3 text-secondary mx-auto col-md-8 ">Comments {{$comments->count()}}</h5>

    @foreach ($comments as $comment)
    <x-single_comment :comment="$comment" />
    @endforeach

    {{$comments->links()}}
</section>