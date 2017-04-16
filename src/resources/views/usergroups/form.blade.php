@foreach ($group->fields as $field=>$data)
  @include('runsite::partials.form-controls.'.$data['controller'].'.'.$data['controller_variant'], [
    'name' => $field,
    'maxlength' => isset($data['maxlength']) ? $data['maxlength'] : null,
    'label' => trans('runsite::user.'.$field),
    'value' => old($field) ?: (isset($group->{$field}) ? $group->{$field} : null),
  ])
@endforeach
