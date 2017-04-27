<?php

namespace Goszowski\Runsite\Models\Field\Types;

class TypeString
{
    public function migrationColumnType()
    {
      return 'string';
    }

    public function migrationMethod($field_name)
    {
      return $this->migrationColumnType().'(\'' .$field_name. '\')';
    }

    public function defaultValue()
    {
      return '';
    }

    public function htmlVisualValue()
    {
      return view('');
    }
}
