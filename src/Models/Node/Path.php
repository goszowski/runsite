<?php

namespace Goszowski\Runsite\Models\Node;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Path extends Eloquent
{
    protected $table = 'rs_absolute_paths';
    protected $fillable = ['node_id', 'name'];

    public function node()
    {
        return $this->belongsTo('Goszowski\Runsite\Models\Node', 'node_id');
    }
}
