<div class="form-group {{ $errors->has($name) ? 'has-error' : ''}}">
  <label for="{{$name}}">{{$label}}</label>
  <input type="checkbox" name="{{$name}}" id="{{$name}}" @if(isset($value) and $value) checked @endif>
  {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>
