<?php

namespace Goszowski\Runsite\Models\Field;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Setting extends Eloquent
{
    protected $table = 'rs_field_settings';
    protected $fillable = ['field_id', 'common_for_all_languages', 'is_required'];

    public function field()
    {
      return $this->belongsTo('\Goszowski\Runsite\Models\Model\Field\Field', 'field_id');
    }
}
