<div class="form-group {{ $errors->has($name) ? 'has-error' : ''}}">
  <label for="{{$name}}">{{$label}}</label>
  <input maxlength="{{$maxlength}}" type="password" name="{{$name}}" class="form-control type-progress" id="{{$name}}" placeholder="{{isset($placeholder) ? $placeholder : null}}" value="">
  {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>
