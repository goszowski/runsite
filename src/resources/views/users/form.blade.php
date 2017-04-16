@foreach ($user->fields as $field=>$data)
  @include('runsite::partials.form-controls.'.$data['controller'].'.'.$data['controller_variant'], [
    'name' => $field,
    'maxlength' => isset($data['maxlength']) ? $data['maxlength'] : null,
    'label' => trans('runsite::user.'.$field),
    'value' => old($field) ?: (isset($user->{$field}) ? $user->{$field} : null),
    'items' => $user->groups(),
    'items_display_field' => 'name',
  ])
@endforeach
