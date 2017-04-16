<div class="form-group {{ $errors->has($name) ? 'has-error' : ''}}">
  <label for="{{$name}}">{{$label}}</label>
  <select class="form-control" id="{{$name}}" name="{{$name}}">
    @if(count($items))
      @foreach($items as $item)
        <option value="{{$item->id}}" @if($value and $item->id == $value) selected @endif>{{$item->{$items_display_field} }}</option>
      @endforeach
    @endif
  </select>
  {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>
