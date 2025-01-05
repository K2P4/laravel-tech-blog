@props(['blog']);

<div class="container ">
    <x-card-wrapper>
        <form method="post" action="/blogs/{{$blog->slug}}/comment" class="p-3">
            @csrf
            <div class="w-full">
                <textarea name="body" required placeholder="comments here..." class="form-control focus:outline-none focus:ring-0 focus:border-transparent text-secondary w-100 border-none h-[150px] " name="body" id="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary  float-right">Submit</button>
        </form>
    </x-card-wrapper>

</div>