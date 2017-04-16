<?php

namespace Goszowski\Runsite\Models\Field;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Field extends Eloquent
{
    protected $table = 'rs_fields';
    protected $fillable = ['model_id', 'name', 'display_name', 'hint'];
    protected $modelsPath = '\Goszowski\Runsite\Models';

    public function settings()
    {
      return $this->hasOne($this->modelsPath.'\Field\Setting', 'field_id');
    }
}
