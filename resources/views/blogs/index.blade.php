<x-layout>

    @if (session('success'))
    <div class="alert alert-success text-center " role="alert">
        <h4 class="alert-heading">Welcome {{session('success')}}</h4>
    </div>
    @endif


    <x-hero />
    <x-blogs-card :blogs="$blogs" />
    <x-sucribe />



</x-layout>