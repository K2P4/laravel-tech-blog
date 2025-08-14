@props(['name','type'=>'text' , 'value'=>''])

<div class="form-group w-full">
    <label class="text-dark" for="{{$name}}"> {{ucwords($name)}} </label>
    <input  value="{{old($name,$value)}}" name="{{$name}}" type="{{$type}}" class="form-control focus:ring-0  text-dark  " id="{{$name}}" placeholder="">
    <x-error name="{{$name}}" />
</div>