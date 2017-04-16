@foreach ($model->fields as $field=>$data)
  @include('runsite::page-builder.field-types.'.$data['controller'].'.default', [
    'name' => $field,
    'maxlength' => $data['maxlength'],
    'label' => trans('runsite::model.'.$data['label']),
    'value' => old($field) ?: (isset($model->{$field}) ? $model->{$field} : null),
  ])
@endforeach
