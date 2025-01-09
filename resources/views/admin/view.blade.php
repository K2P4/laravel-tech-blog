

<x-layout>
    <x-background>
        <div class="flex gap-5">

            <x-dashboard.view />

            <x-dashboard.create :categories="$categories" />

        </div>

    </x-background>

</x-layout>