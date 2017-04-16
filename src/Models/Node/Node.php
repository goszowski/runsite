<?php

namespace Goszowski\Runsite\Models\Node;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Node extends Eloquent
{
    protected $table = 'rs_nodes';
    protected $fillable = ['parent_id', 'model_id'];

    public function settings()
    {
      return $this->hasOne('\Goszowski\Runsite\Models\Node\Setting', 'node_id');
    }

    public function paths()
    {
      return $this->hasMany('\Goszowski\Runsite\Models\Node\Path', 'node_id');
    }

    public function path()
    {
      return $this->hasOne('\Goszowski\Runsite\Models\Node\Path', 'node_id')->orderBy('create_at', 'desc')->first();
    }
}
