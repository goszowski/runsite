@if($item->{$field})
  <span class="label label-success">{{trans('runsite::main.yes')}}</span>
@else
  <span class="label label-danger">{{trans('runsite::main.no')}}</span>
@endif
