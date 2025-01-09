  @props(['name','value'=>''])
  <div class="form-group">
    <label class="text-dark " for="{{$name}}">{{ucwords($name)}}</label>
    <textarea
      name="{{$name}}"
      id="{{$name}}"
      cols="30"
      rows="10"
      class="form-control editor">{{old($name,$value)}}</textarea>
    <x-error name="{{$name}}" />
  </div>