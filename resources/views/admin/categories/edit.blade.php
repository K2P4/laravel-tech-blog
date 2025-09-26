<x-layout>
        <x-utility.snackbar />

    <x-background>
        <div class="flex gap-4">

            <x-layout.admin_navbar />

            <div class="w-full">
                <div class="flex items-center col-md-12 justify-between mb-2">
                    <h1 class=" text-xl     font-medium  text-dark tracking-wide  text-left ">Edit Category</h1>
                    <a href="/admin/categories">
                        <button class=" btn btn-primary  ">Back</button>
                    </a>
                </div>
                <form action="/admin/categories/{{ $category->id }}" method="POST"
                    class="card bg-transparent shadow-md px-4 py-3 col-md-12 mb-4">
                    @csrf
                    @method('PATCH')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="text-dark" for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $category->name }}" required>
                            <x-error name="name" />
                        </div>
                        <div class="col-md-6">
                            <label class="text-dark" for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug"
                                value="{{ $category->slug }}" required>
                            <x-error name="slug" />
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/admin/categories" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </x-background>
</x-layout>
