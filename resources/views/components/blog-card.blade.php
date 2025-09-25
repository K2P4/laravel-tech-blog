@props(['blog'])

<div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden flex flex-col h-[500px]">
    <a href="/blogs/{{$blog->slug}}" class="block group">
        <div class="aspect-w-16 aspect-h-9 bg-gray-100 overflow-hidden">
            @php
                $thumb = $blog->thumbnail;
                $thumbSrc = $thumb && (\Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])) ? $thumb : ($thumb ? '/storage/' . $thumb : '/logo/thura-logo.png');
            @endphp
            <img
                src="{{ $thumbSrc }}"
                alt="{{$blog->title}}"
                class="object-cover w-full h-[260px]  group-hover:scale-105 transition-transform duration-300"
            />
        </div>
    </a>
    <div class="flex-1 flex flex-col px-4 py-3">
        <div class="flex items-center gap-4 mb-4">
            <a href="/?username={{$blog->author->username}}{{request('search')?'&search='.request('search') : ''}}{{request('category')?'&category='.request('category') : ''}}">
                <img src="{{ $blog->author->avatar ?? '/default-avatar.png' }}" alt="{{$blog->author->name}}" class="w-12 h-12 rounded-full border object-cover" />
            </a>
            <div class="text-left">
                <a href="/?username={{$blog->author->username}}{{request('search')?'&search='.request('search') : ''}}{{request('category')?'&category='.request('category') : ''}}" class="font-semibold ">
                    {{$blog->author->name}}
                </a>
                <div class="text-xs text-gray-500">{{$blog->created_at->diffForHumans()}}</div>
            </div>
            <span class="ml-auto">
                <a href="/?category={{$blog->category->slug}}" class="inline-flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-500 rounded text-xs font-medium hover:bg-blue-200 transition">
                    {{$blog->category->name}}
                </a>
            </span>
        </div>
        <h3 class="text-xl font-bold mb-3 line-clamp-2">
            <a href="/blogs/{{$blog->slug}}" class="text-gray-900 hover:text-blue-600 transition-colors">{{$blog->title}}</a>
        </h3>
        <p class="text-gray-600 mb-4 line-clamp-3">{!! $blog->intro !!}</p>
        <div class="mt-auto">
            <a href="/blogs/{{$blog->slug}}" class="inline-block px-4 py-2 bg-primary text-white rounded hover:bg-blue-600 transition">Read More</a>
        </div>
    </div>
</div>