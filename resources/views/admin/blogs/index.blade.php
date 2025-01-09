@props(['blogs'])

<x-layout>
    <x-background>
        <div class="flex gap-5">

            <x-dashboard.view />


            <div class="w-full">
                <h1 class=" text-xl mb-2    font-medium  text-dark tracking-wide  mx-auto ">Blog Table</h1>
                <table class="table col-md-8 mt-3 table-striped ">

                    <thead class="  bg-blue-500 rounded-sm text-white font-normal ">
                        <tr>
                            <th class=" font-medium w-[30%]" scope="col">Title</th>
                            <th class=" font-medium w-[25%]" scope="col">Intro</th>
                            <th class=" font-medium w-[20%]" scope="col">Slug</th>
                            <th class=" font-medium w-[25%]" scope="col">Edit / Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr class="   ">
                            <td class="  align-middle ">{{$blog->title}}</td>
                            <td class="  align-middle ">{{$blog->intro}}</td>
                            <td class="  align-middle ">{{$blog->slug}}</td>
                            <td class="  align-middle w-full">
                                <div class="flex align-middle items-center  gap-2">
                                    <button type="button" class="btn duration-500 active:scale-95 btn-primary w-full">
                                        <a class="  text-decoration-none text-white" href="/admin/{{$blog->slug}}/edit" target="_blank">Edit</a>
                                    </button>
                                    <form id="deleteForm" class="w-full" action="/admin/{{$blog->slug}}/delete" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" id="deleteButton" class="btn btn-danger duration-500 active:scale-95  w-full">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>

                {{$blogs->Links()}}

            </div>







        </div>

    </x-background>

</x-layout>



<script>
    document.getElementById('deleteButton').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to delete these records ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    });
</script>