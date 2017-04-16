@foreach ($language->fields as $field=>$data)
  @include('runsite::partials.form-controls.'.$data['controller'].'.'.$data['controller_variant'], [
    'name' => $field,
    'maxlength' => isset($data['maxlength']) ? $data['maxlength'] : null,
    'label' => trans('runsite::language.'.$field),
    'value' => old($field) ?: (isset($language->{$field}) ? $language->{$field} : null),
  ])
@endforeach
