@props(['blog', 'categories'])
<div class="w-full">

    <div class="flex items-center col-md-12 justify-between mb-2">
        <h1 class=" text-xl     font-medium  text-dark tracking-wide  text-left ">Edit Blog</h1>
        <a href="/admin/blogs">
            <button class=" btn btn-primary  ">Back</button>
        </a>
    </div>

    <form enctype="multipart/form-data" action="/admin/{{ $blog->slug }}/update" method="post"
        class="card  bg-transparent  shadow-md  px-4  space-y-4  py-3  col-md-12">

        @method('PATCH')
        @csrf

        <x-form.input name='title' :value='$blog->title' />
        <x-form.textarea name='body' :value='$blog->body' />
        <div class="flex items-center gap-4 ">
            <x-form.input name='slug' :value='$blog->slug' />
            <x-form.input name='intro' :value='$blog->intro' />
        </div>

        <x-form.input name='thumbnail' type='file' />
        @php
            $thumb = $blog->thumbnail;
            $thumbSrc = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])  ? $thumb: ($thumb
                        ? '/storage/' . $thumb
                        : '/logo/thura-logo.png');
        @endphp
        <img src="{{ $thumbSrc }}" class=" h-[180px]  rounded-sm object-center " alt="">



        <!-- category -->
        <div class="form-group">
            <label class="text-dark" for="category_id">Category</label>
            <select required name="category_id" id="category_id" class="form-control text-dark focus:ring-0">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <x-error name="category_id" />


        <button type="submit"
            class=" border-blue-400   mt-4  py-2 text-md tracking-wide text-white active:scale-95 text-center border bg-blue-500 rounded-md hover:bg-blue-500 transition-transform duration-500">Edit
        </button>
    </form>
</div>
