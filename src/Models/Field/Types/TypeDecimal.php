<?php

namespace Goszowski\Runsite\Models\Field\Types;

class TypeDecimal
{
    public function migrationColumnType()
    {
      return 'decimal';
    }

    public function migrationMethod($field_name)
    {
      return $this->migrationColumnType().'(\'' .$field_name. '\', 8, 2)';
    }

    public function defaultValue()
    {
      return 0;
    }

    public function htmlVisualValue()
    {
      return view('');
    }
}
