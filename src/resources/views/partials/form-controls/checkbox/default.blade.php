<div class="form-group {{ $errors->has($name) ? 'has-error' : ''}}">

  <div class="checkbox checkbox-primary">
    <input type="checkbox" id="{{$name}}" name="{{$name}}" {{ (isset($value) and $value) ? 'checked' : null}}>
    <label for="{{$name}}">{{$label}}</label>
  </div>

  {{-- <label for="{{$name}}">{{$label}}</label> --}}
  {{-- <input maxlength="{{$maxlength}}" type="text" name="{{$name}}" class="form-control type-progress" id="{{$name}}" placeholder="{{isset($placeholder) ? $placeholder : null}}" value="{{isset($value) ? $value : null}}"> --}}
  {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>
