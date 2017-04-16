<div class="form-group {{ $errors->has($name) ? 'has-error' : ''}}">
  <label for="{{$name}}">{{$label}}</label>
  <input maxlength="{{$maxlength}}" type="text" name="{{$name}}" class="form-control type-progress" id="{{$name}}" placeholder="{{isset($placeholder) ? $placeholder : null}}" value="{{isset($value) ? $value : null}}">
  {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>
