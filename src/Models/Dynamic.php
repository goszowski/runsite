<?php

namespace Goszowski\Runsite\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use DateTime;
use Facades\ {
    Goszowski\Runsite\Helpers\Scope,
    Goszowski\Stub\Stub
};

use Artisan;

class Dynamic extends Eloquent
{
    protected $table      = '';
    protected $fillable   = ['node_id', 'parent_id', 'language_id', 'position'];
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

    public function language()
    {
      return $this->belongsTo('\Goszowski\Runsite\Models\Language', 'language_id');
    }

    public function save(array $options = [], $inDatabase = false)
    {
      if($inDatabase)
      {
        return parent::save($options);
      }

      $dateNow = (new DateTime)->format('Y_m_d_His').microtime(true);

      $fileName = $dateNow . '_update_node_' . $this->id . '_locale_' . $this->language->locale . '_' . str_replace('-', '_', str_slug($dateNow)) . '.php';
      $migrationName = 'UpdateNode' . $this->id . 'Locale' .studly_case($this->language->locale . str_replace('-', '_', str_slug($dateNow)));

      $stub = Stub::load(__DIR__ . '/../resources/stubs/migrations/node/update.stub');

      $stub->replace('MigrationName', $migrationName);
      $stub->replace('ModelName', $this->node->model->name);
      $stub->replace('PathName', $this->node->path->name);
      $stub->replace('LanguageLocale', $this->language->locale);

      $fields = '';
      foreach($this->node->model->fields() as $field)
      {
        $fields .= '        $dynamic->'.$field->name.' = ' . $field->type()::setValue($this->{$field->name}) . ";\n";
      }

      // $this->{$field->name}

      $stub->replace('Fields', $fields);

      $stub->store(database_path('/migrations'), $fileName);

      Artisan::call('migrate');

    }

}
