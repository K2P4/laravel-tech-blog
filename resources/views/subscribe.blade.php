<x-layout>

    <section class="container my-5">
        <div class="text-center">
            <img src="{{ asset('assets/not-found.jpg') }}" alt="Subscribe" class="img-fluid mb-4 mx-auto"
                style="max-width: 220px;" />
            <h1 class="display-6 fw-bold mb-3">Stay in the loop</h1>
            <p class="text-muted mb-4">Subscribe to blogs to get notified when new comments arrive. Open any blog and
                click the Subscribe button. You need an account to subscribe.</p>

            @auth
                <a href="/" class="btn btn-primary">Browse Blogs</a>
            @else
                <a href="/login" class="btn btn-primary me-2">Login</a>
                <a href="/register" class="btn btn-outline-primary">Create account</a>
            @endauth
        </div>
    </section>

</x-layout>
