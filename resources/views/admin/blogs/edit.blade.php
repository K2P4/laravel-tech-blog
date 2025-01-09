<x-layout>
    <x-background>
        <div class="flex gap-5">

            <x-dashboard.view />
            <x-dashboard.update :categories="$categories" :blog="$blog" />

        </div>

    </x-background>

</x-layout>