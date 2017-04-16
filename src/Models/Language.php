<?php

namespace Goszowski\Runsite\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Language extends Eloquent
{
    protected $table = 'rs_languages';
    protected $fillable = ['locale', 'country_code', 'display_name', 'is_active'];

    public $fields = [
      'locale'                  => ['controller'=> 'text', 'controller_variant'=>'default',     'maxlength'=>10, 'show_in_list'=>true],
      'country_code'            => ['controller'=> 'text', 'controller_variant'=>'default',     'maxlength'=>255, 'show_in_list'=>true],
      'display_name'            => ['controller'=> 'text', 'controller_variant'=>'default',     'maxlength'=>255, 'show_in_list'=>true],
      'is_active'               => ['controller'=> 'checkbox', 'controller_variant'=>'default', 'show_in_list'=>true],
    ];
}
