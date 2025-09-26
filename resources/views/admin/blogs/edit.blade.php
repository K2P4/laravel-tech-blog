<x-layout>
        <x-utility.snackbar />

    <x-background>
        <div class="flex gap-4">

            <x-layout.admin_navbar />
            <x-blogs.update :categories="$categories" :blog="$blog" />

        </div>

    </x-background>

</x-layout>