<x-layout>
    <x-utility.snackbar />

    <x-background>
        <div class="flex gap-4">

            <x-layout.admin_navbar />

            <div class="w-full">
                <h1 class=" text-xl mb-2    font-medium  text-dark tracking-wide  mx-auto ">Users</h1>

                <table class="table col-md-12 mt-3  ">
                    <thead class="  bg-blue-500 rounded-sm text-white font-normal ">
                        <tr>
                            <th class=" font-medium" scope="col">Name</th>
                            <th class=" font-medium" scope="col">Email</th>
                            <th class=" font-medium" scope="col">Username</th>
                            <th class=" font-medium" scope="col">Is Admin</th>
                            <th class=" font-medium" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">Not Found Users .</td>
                            </tr>
                        @endif
                        @foreach ($users as $user)
                            <tr>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">{{ $user->username }}</td>
                                <td class="align-middle">
                                    <span
                                        class="badge {{ $user->is_admin ? 'bg-success' : 'bg-secondary' }}">{{ $user->is_admin ? 'Yes' : 'No' }}</span>
                                </td>
                                <td class="align-middle">
                                    <form action="/admin/users/{{ $user->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="is_admin" value="{{ $user->is_admin ? 0 : 1 }}">
                                        <button type="submit" class="btn btn-outline-primary btn-sm">
                                            {{ $user->is_admin ? 'Revoke Admin' : 'Make Admin' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->links() }}
            </div>

        </div>
    </x-background>
</x-layout>
