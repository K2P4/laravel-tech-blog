<div class="w-full">

    <div class="flex items-center col-md-12 justify-between mb-2">
        <h1 class=" text-xl     font-medium  text-dark tracking-wide  text-left ">Create Blog</h1>
        <a href="/admin/blogs">
            <button class=" btn btn-primary  ">Back</button>
        </a>
    </div>
    
    <form enctype="multipart/form-data" action="/admin/blogs/create" method="post"
        class="card  bg-transparent  shadow-md  px-4  space-y-4  py-3  col-md-12">

        @csrf

        <x-form.input name='title' />
        <x-form.textarea name='body' />
        <div class="flex items-center gap-4 ">
            <x-form.input name='slug' />
            <x-form.input name='intro' />
        </div>

        <x-form.input name='thumbnail' type='file' />



        <!-- category -->
        <div class="form-group">
            <label class="text-dark" for="category_id">Category</label>
            <select required name="category_id" id="category_id" class="form-control text-dark focus:ring-0">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <x-error name="category_id" />


        <button type="submit"
            class=" border-blue-400   mt-4  py-2 text-md tracking-wide text-white active:scale-95 text-center border bg-blue-500 rounded-md hover:bg-blue-500 transition-transform duration-500">CREATE
        </button>
    </form>
</div>
