<x-layout>
        <x-utility.snackbar />

    <x-background>
        <div class="flex gap-4">

            <x-layout.admin_navbar />
            <x-blogs.create :categories="$categories" />

        </div>

    </x-background>

</x-layout>