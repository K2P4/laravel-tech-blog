@props(['title' => 'Not Found', 'message' => 'The page you are looking for does not exist.'])

<div class="container d-flex flex-column align-items-center justify-content-center my-5 w-100">
    <img src="{{ asset('assets/not-found.jpg') }}" alt="Not found" class="img-fluid" style="max-width: 360px;" />
    <h2 class="mt-4">{{ $title }}</h2>
    <p class="text-muted">{{ $message }}</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-2">Go Home</a>
</div>
