@props(['blog'])

<div class="text-center mx-auto">
    @php
        $thumb = $blog->thumbnail;
        $thumbSrc = $thumb && (\Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])) ? $thumb : ($thumb ? '/storage/' . $thumb : '/logo/thura-logo.png');
    @endphp
    <img src="{{ $thumbSrc }}" class=" text-center object-cover mx-auto" alt="..." />
    <div class="card-body">
        <h3 class=" text-3xl   text-bold text-gray-800 "><a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a></h3>
        <p class="fs-6  mt-1 ">
            <a
                href="/?username={{ $blog->author->username }}{{ request('search') ? '&search=' . request('search') : '' }}
         {{ request('category') ? '&category=' . request('category') : '' }}">
                Author Name- <span class=" text-bold ">{{ $blog->author->name }}</span>
            </a>
        </p>

        <h6 class="text-gray-500 my-3"> {{ $blog->created_at->diffForHumans() }}</h6>

        <div class="flex items-center gap-3  justify-center my-3 text-capitalize" id="subscribe">
            <button type="button"
                class=" bg-blue-500 rounded-md active:scale-95 text-white font-medium px-4 py-2   hover:bg-blue-400 transition-all duration-500 "><a
                    class=" text-decoration-none "
                    href="/?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a></button>

            @auth
                <x-subscription :blog="$blog" />
            @endauth
        </div>

        <p class="w-[70%] text-center mx-auto">
            {!! $blog->body !!}
        </p>

    </div>
</div>
