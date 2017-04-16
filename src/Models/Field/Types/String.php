<?php

namespace Goszowski\Runsite\Models\Field\Types;

class String
{
    public function defaultValue()
    {
      return '';
    }

    public function htmlVisualValue()
    {
      return view('');
    }
}
