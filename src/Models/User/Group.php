<?php

namespace Goszowski\Runsite\Models\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Group extends Eloquent
{
    protected $table = 'rs_user_groups';
    protected $fillable = ['name'];

    public $fields = [
      'name'                  => ['controller'=> 'text', 'controller_variant'=>'default', 'maxlength'=>255, 'show_in_list'=>true],
    ];
}
