<?php

namespace Goszowski\Runsite\Models\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Goszowski\Runsite\Models\User\Group;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'rs_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $fields = [
      'name'                  => ['controller'=> 'text', 'controller_variant'=>'default',     'maxlength'=>255, 'show_in_list'=>true],
      'email'                 => ['controller'=> 'text', 'controller_variant'=>'default',     'maxlength'=>255, 'show_in_list'=>true],
      'group_id'              => ['controller'=> 'select', 'controller_variant'=>'relation',  'maxlength'=>255, 'show_in_list'=>true, 'relation'=>'group'],
      'password'              => ['controller'=> 'password', 'controller_variant'=>'default', 'maxlength'=>255, 'show_in_list'=>true],
    ];

    public function groups()
    {
        return Group::get();
    }

    public function group()
    {
        return $this->belongsTo('\Goszowski\Runsite\Models\User\Group');
    }
}
