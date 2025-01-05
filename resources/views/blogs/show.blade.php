<x-layout>


    <x-blog-section :blog="$blog" />

    @auth()
    <x-comment-form :blog="$blog" />
    @else
    <div class="flex  justify-center items-center gap-5 ">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
            <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2" />
        </svg>
        <p class="text-center my-5  tracking-wide ">Please <a class=" underline font-medium text-blue-500" href="/login">Login</a> to participate in this disscussion.</p>
    </div>
    @endauth

    @if ($blog->comment->count())
    <x-comments :comments="$blog->comment()->latest()->paginate(3)" />
    @endif

    <x-blog_you_may_like :randomBlogs="$randomBlogs" :categories="$categories" />





</x-layout>