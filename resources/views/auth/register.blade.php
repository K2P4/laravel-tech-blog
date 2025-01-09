<x-layout>
    <x-background>
        <h1 class=" text-xl mb-2  font-medium text-dark tracking-wide text-center mx-auto ">Register</h1>

        <form action="/register" method="post" class="card  bg-transparent  shadow-sm shadow-blue-500 px-4  space-y-4  pt-3 pb-5 mx-auto col-md-6">
            @csrf
            <x-form.input name='name' />
            <x-form.input name='username' />
            <x-form.input name='email' type='email' />
            <x-form.input name='password' />


            <button type="submit" class=" border-blue-400   mt-4  py-2 text-md tracking-wide text-white active:scale-95 text-center border bg-blue-500 rounded-md hover:bg-blue-500 transition-transform duration-500">SUBMIT </button>



        </form>
    </x-background>



</x-layout>