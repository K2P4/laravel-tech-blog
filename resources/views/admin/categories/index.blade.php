<x-layout>
    <x-background>
        <div class="flex gap-5">

            <x-dashboard.view />

            <div class="w-full">
                <h1 class=" text-xl mb-2    font-medium  text-dark tracking-wide  mx-auto ">Categories</h1>

                <form action="/admin/categories" method="POST"
                    class="card bg-transparent shadow-md px-4 py-3 col-md-10 mb-4">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label class="text-dark" for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                            <x-error name="name" />
                        </div>
                        <div class="col-md-4">
                            <label class="text-dark" for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" required>
                            <x-error name="slug" />
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">Add Category</button>
                        </div>
                    </div>
                </form>

                <table class="table col-md-10 mt-3 table-striped ">
                    <thead class="  bg-blue-500 rounded-sm text-white font-normal ">
                        <tr>
                            <th class=" font-medium w-[40%]" scope="col">Name</th>
                            <th class=" font-medium w-[30%]" scope="col">Slug</th>
                            <th class=" font-medium w-[30%]" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="align-middle">{{ $category->name }}</td>
                                <td class="align-middle">{{ $category->slug }}</td>
                                <td class="align-middle">
                                    <div class="d-flex gap-2">
                                        <a href="/admin/categories/{{ $category->id }}/edit"
                                            class="btn btn-primary">Edit</a>
                                        <form action="/admin/categories/{{ $category->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $categories->links() }}
            </div>

        </div>
    </x-background>
</x-layout>
