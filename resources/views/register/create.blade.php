<x-layout>
    <div class="">

        <div class="container  col-md-4 card  shadow-sm my-3  py-3 px-md-3 ">
            <form method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input value="{{old('name')}}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input value="{{old('username')}}" name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input value="{{old('password')}}" name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>

                <ul class="  list-unstyled mt-2">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger text-sm ">{{$error}}</li>
                    @endforeach
                </ul>

            </form>
        </div>
    </div>
</x-layout>