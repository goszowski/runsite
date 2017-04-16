<?php

namespace Goszowski\Runsite\Models\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $table = 'rs_models';
    protected $fillable = ['name', 'display_name', 'display_name_plural'];

    public $fields = [
      'name'                  => ['controller'=> 'text', 'controller_variant'=>'default', 'id'=>'name',                'maxlength'=>255, 'show_in_list'=>true, 'label'=>'name'],
      'display_name'          => ['controller'=> 'text', 'controller_variant'=>'default', 'id'=>'display_name',        'maxlength'=>255, 'show_in_list'=>true, 'label'=>'display_name'],
      'display_name_plural'   => ['controller'=> 'text', 'controller_variant'=>'default', 'id'=>'display_name_plural', 'maxlength'=>255, 'show_in_list'=>true, 'label'=>'display_name_plural'],
    ];

    public function settings()
    {
      return $this->belongsTo('\Goszowski\Runsite\Models\Model\Setting');
    }
}
