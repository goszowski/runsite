<?php

namespace Goszowski\Runsite\Models\Field\Types;

class TypeBoolean
{
    public function migrationColumnType()
    {
      return 'boolean';
    }

    public function migrationMethod($field_name)
    {
      return $this->migrationColumnType().'(\'' .$field_name. '\')';
    }

    public function defaultValue()
    {
      return true;
    }

    public function visualValue($value)
    {
      $value = $value ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>';
      return view('runsite::page-builder.field-types.checkbox._nodes_view', compact('value'));
    }

    public function fieldTemplate()
    {
      return 'checkbox.default';
    }

    public function setValue($value)
    {
      return $value == 'on' ? 'true' : 'false';
    }
}
