@props(['blogsCount', 'categoriesCount', 'usersCount', 'recentBlogs'])

<x-layout>
    <x-utility.snackbar/>

    <x-background>

        <div class="flex gap-4">

            <x-layout.admin_navbar />
            <x-dashboard.index :blogsCount="$blogsCount" :categoriesCount="$categoriesCount" :usersCount="$usersCount" :recentBlogs="$recentBlogs" />
        </div>

    </x-background>

</x-layout>
