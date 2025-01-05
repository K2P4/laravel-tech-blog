@props(['name'])

@error($name)
<p class="text-danger text-lowercase text-sm ">{{$message}}</p>
@enderror