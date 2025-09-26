<x-layout>
    <div class="container mx-auto mt-4 p-6">
        <div class="max-w-3xl mx-auto bg-white rounded shadow p-6">
            <div class="flex items-center gap-4">
                <img src="{{ $user->avatar ?? '/default-avatar.png' }}" class="w-28 h-28 rounded-full object-cover"
                    alt="avatar">
                <div>
                    <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                    <p class="text-gray-600">{{ $user->email }}</p>
                    <p class="text-sm text-gray-500">Joined {{ $user->created_at->toFormattedDateString() }}</p>

                    {{-- @auth
                        @if (auth()->id() === $user->id)
                            <a href="/profile/edit" class="text-sm text-blue-600 mt-2 inline-block">Edit profile</a>
                        @endif
                    @endauth --}}
                </div>
            </div>


            <div class="mt-6 grid grid-cols-3 text-white gap-4">
                <div class="p-4 bg-green-500  rounded">Blogs <div class="text-xl font-semibold">
                        {{ $user->blogs()->count() }}</div>
                </div>
                <div class="p-4 bg-yellow-500  rounded">Subscribers <div class="text-xl font-semibold">
                        {{ $totalSubscribers ?? 0 }}</div>
                </div>
                <div class="p-4 bg-blue-600  rounded">Is Admin <div class="text-xl font-semibold">
                        {{ $user->is_admin ? 'Yes' : 'No' }}</div>
                </div>

            </div>


            <div class="mt-6">
                <h3 class="font-medium">Recent posts</h3>
                <ul class="mt-2 space-y-2">
                    @foreach ($user->blogs()->latest()->take(5)->get() as $blog)
                        <li><a href="/blogs/{{ $blog->slug }}"
                                class="text-blue-600 hover:underline">{{ $blog->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-layout>
