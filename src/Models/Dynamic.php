<?php

namespace Goszowski\Runsite\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Facades\ {
    Goszowski\Runsite\Helpers\Scope
};

class Dynamic extends Eloquent
{
    protected $table      = '';
    protected $fillable   = [];
    public $dates         = [];

    public function __construct($table, $dates=null)
    {
        parent::__construct();

        if($table)
        {
            $this->table = $table;
            Scope::set('DynamicTable', $table);
        }
        elseif(Scope::get('DynamicTable'))
        {
            $this->table = Scope::get('DynamicTable');
        }

        if($dates)
        {
          $this->dates = $dates;
        }

    }


    // Template: $this->has('user');

    public function has($modelName)
    {
      $this->{$modelName} =  Model($modelName)->where('node_id', $this->{$modelName.'_id'})->first();
      return $this->{$modelName};
    }

    // Template: $this->has('users');

    public function hasMore($fieldName)
    {
      $ids = explode(',', $this->{$fieldName});
      $this->{$fieldName} = Model(str_singular($fieldName))->whereIn('node_id', $ids)->get();
      return $this->{$fieldName};
    }


    public function node()
    {
      return $this->belongsTo('\Goszowski\Runsite\Models\Node\Node', 'node_id');
    }
}
