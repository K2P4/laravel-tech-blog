<x-layout>
    <div class=" my-3 text-primary">
        <h3 class=" text-bold   text-blue-500 text-center mx-auto ">Register Form</h3>

        <div class="container  col-md-4 card  shadow-sm py-3 px-md-3 ">
            <form action="/register" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input required value="{{old('name')}}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <x-error name="name" />


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input required value="{{old('username')}}" name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <x-error name="username" />

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input required value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <x-error name="email" />

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input required value="{{old('password')}}" name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <x-error name="password" />



                <button type="submit" class="btn btn-primary">Submit</button>



            </form>
        </div>
    </div>
</x-layout>