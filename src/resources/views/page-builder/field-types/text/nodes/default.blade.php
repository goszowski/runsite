<div class="form-group clearfix {{ $errors->has($name) ? 'has-error' : ''}}">
  <label for="{{$name}}" class="col-lg-2">
    <strong>{{$label}}</strong>
  </label>
  <div class="col-lg-10">
    <input maxlength="{{$maxlength}}" type="text" name="{{$name}}" class="form-control type-progress" id="{{$name}}" placeholder="{{isset($placeholder) ? $placeholder : null}}" value="{{isset($value) ? $value : null}}">
    {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
  </div>
</div>
