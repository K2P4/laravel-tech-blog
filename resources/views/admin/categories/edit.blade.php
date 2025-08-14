<x-layout>
    <x-background>
        <div class="flex gap-5">

            <x-dashboard.view />

            <div class="w-full">
                <h1 class=" text-xl mb-2    font-medium  text-dark tracking-wide  mx-auto ">Edit Category</h1>

                <form action="/admin/categories/{{ $category->id }}" method="POST"
                    class="card bg-transparent shadow-md px-4 py-3 col-md-10 mb-4">
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
