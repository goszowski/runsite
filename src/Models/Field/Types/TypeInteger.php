<?php

namespace Goszowski\Runsite\Models\Field\Types;

class TypeString
{
    public function migrationColumnType()
    {
      return 'integer';
    }

    public function migrationMethod($field_name)
    {
      return $this->migrationColumnType().'(\'' .$field_name. '\')';
    }

    public function defaultValue()
    {
      return 0;
    }

    public function visualValue($value)
    {
      return view('');
    }

    public function fieldTemplate()
    {
      return 'text.default';
    }
}
