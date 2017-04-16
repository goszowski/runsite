<?php

namespace Goszowski\Runsite\Models\Node;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Setting extends Eloquent
{
    protected $table = 'rs_node_settings';
    protected $fillable = ['node_id', 'controller'];
}
