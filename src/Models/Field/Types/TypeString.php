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

    public function visualValue($value)
    {
      return view('runsite::page-builder.field-types.text._nodes_view', compact('value'));
    }

    public function fieldTemplate()
    {
      return 'text.nodes.default';
    }

    public function setValue($value)
    {
      return '\'' . str_replace("'", "\'", $value) . '\'';
    }
}
