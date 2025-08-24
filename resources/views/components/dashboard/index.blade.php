@props(['blogsCount', 'categoriesCount', 'usersCount', 'recentBlogs'])

<div class="w-full">
    <h1 class="text-xl  mb-3   font-medium  text-dark tracking-wide  text-left ">Dashboard</h1>

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        {{-- Blogs --}}
        <div
            class="flex items-center justify-between bg-green-500 text-white shadow-lg rounded-2xl p-6 transition transform  hover:shadow-xl">
            <div>
                <h2 class="text-md font-medium opacity-90">Total Blogs</h2>
                <p class="text-3xl font-bold mt-2">{{ $blogsCount }}</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                class="bi bi-clipboard-data" viewBox="0 0 16 16">
                <path
                    d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0z" />
                <path
                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                <path
                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
            </svg>
        </div>

        {{-- Categories --}}
        <div
            class="flex items-center justify-between bg-yellow-500 text-white shadow-lg rounded-2xl p-6 transition transform  hover:shadow-xl">
            <div>
                <h2 class="text-md font-medium opacity-90">Categories</h2>
                <p class="text-3xl font-bold mt-2">{{ $categoriesCount }}</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-grid"
                viewBox="0 0 16 16">
                <path
                    d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
            </svg>
        </div>

        {{-- Users --}}
        <div
            class="flex items-center justify-between bg-blue-600 text-white shadow-lg rounded-2xl p-6 transition transform  hover:shadow-xl">
            <div>
                <h2 class="text-md font-medium opacity-90">Users</h2>
                <p class="text-3xl font-bold mt-2">{{ $usersCount }}</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                class="bi bi-people" viewBox="0 0 16 16">
                <path
                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
            </svg>
        </div>
    </div>


    {{-- Recent Blogs --}}
    <div class="bg-white shadow rounded-xl p-4">
        <h2 class="text-lg font-medium mb-4">Recent Blogs</h2>
        <table class="table col-md-12 mt-2 ">
            <thead class="bg-blue-500 rounded-sm text-white font-normal">
                <tr>
                    <th class="p-3">Title</th>
                    <th class="p-3">Author</th>
                    <th class="p-3">Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentBlogs as $blog)
                    <tr class="border-t">
                        <td class="p-3 align-middle">{{ $blog->title }}</td>
                        <td class="p-3 align-middle">{{ $blog->user->name ?? 'Unknown' }}</td>
                        <td class="p-3 align-middle">{{ $blog->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-3 text-center text-gray-500">No recent blogs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
