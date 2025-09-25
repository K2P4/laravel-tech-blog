<x-layout>
    <div class="container mx-auto p-6">
        <div class="flex gap-4">
            <x-layout.admin_navbar />

            <div class="w-full">
                <div class="flex items-center col-md-12 justify-between mb-2">
                    <h1 class=" text-xl     font-medium  text-dark tracking-wide  text-left ">User Information</h1>
                    <a href="/admin/users">
                        <button class=" btn btn-primary  ">Back</button>
                    </a>
                </div>


                <div class="bg-white col-md-12 rounded w-full my-2 shadow p-6">
                    <div class="flex items-center gap-6">
                        <img src="{{ $user->avatar ?? '/default-avatar.png' }}"
                            class="w-28 h-28 rounded-full object-cover" alt="avatar">
                        <div>
                            <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            <p class="text-sm text-gray-500">Joined {{ $user->created_at->toFormattedDateString() }}</p>
                        </div>
                    </div>

            <div class="mt-6 grid grid-cols-3 text-white gap-4">
            <div class="p-4 bg-green-500  rounded">Blogs <div class="text-xl font-semibold">
                {{ $user->blogs()->count() }}</div>
            </div>

            <div class="p-4 bg-yellow-500 rounded">Subscribers <div class="text-xl font-semibold">
                {{ $totalSubscribers ?? 0 }}</div>
            </div>
                        <div class="p-4 bg-blue-600  rounded">Is Admin <div class="text-xl font-semibold">
                                {{ $user->is_admin ? 'Yes' : 'No' }}</div>
                        </div>

                    </div>

                    <div class="mt-6">
                        <h2 class="font-semibold mb-2">Recent posts</h2>
                        <ul class="space-y-2">
                            @foreach ($user->blogs()->latest()->take(5)->get() as $b)
                                <li><a href="/blogs/{{ $b->slug }}"
                                        class="text-blue-600 hover:underline">{{ $b->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
