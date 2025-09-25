<x-layout>
    <x-background>
        <h1 class=" text-xl mb-2  font-medium text-dark tracking-wide text-center mx-auto ">Login</h1>

        <form method="post"
            class="card bg-transparent shadow-sm shadow-blue-500 px-4 space-y-4 pt-3 pb-5 mx-auto my-auto flex flex-col
             col-md-6"
            id="login-form">
            @csrf
            <x-form.input name='email' type='email' />
            <x-form.input name='password' type='password' />

            <button type="submit" id="login-submit"
                class="border-blue-400 mt-1 py-2 text-md tracking-wide text-white active:scale-95 text-center border bg-blue-500 rounded-md hover:bg-blue-600 disabled:opacity-70 disabled:cursor-not-allowed transition-all duration-300 flex items-center justify-center gap-2">
                <svg id="login-spinner" class="hidden animate-spin h-5 w-5 text-white" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
                <span id="login-button-text">Sign in</span>
            </button>

            <p class="text-center text-gray-400 text-xs">Don't have an account?
                <a href="/register" class="text-blue-400 hover:text-blue-300 underline">Create one</a>
            </p>
        </form>

        <script>
            (function() {
                const form = document.getElementById('login-form');
                if (!form) return;
                const submit = document.getElementById('login-submit');
                const spinner = document.getElementById('login-spinner');
                const label = document.getElementById('login-button-text');
                form.addEventListener('submit', function() {
                    if (submit) {
                        submit.disabled = true;
                    }
                    if (spinner) {
                        spinner.classList.remove('hidden');
                    }
                    if (label) {
                        label.textContent = 'Signing in...';
                    }
                });
            })();
        </script>

    </x-background>




</x-layout>
