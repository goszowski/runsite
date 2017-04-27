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
      return false;
    }

    public function htmlVisualValue()
    {
      return view('');
    }
}
