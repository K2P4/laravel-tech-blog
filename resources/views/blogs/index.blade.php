<x-layout>

    @if (session('success'))
    <div class="alert alert-success text-center mt-7" role="alert">
        <h4 class="alert-heading"> {{session('success')}}</h4>
    </div>
    @endif


    <x-hero />
    <x-blogs-card :blogs="$blogs" />



</x-layout>