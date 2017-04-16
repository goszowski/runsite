<?php

namespace Goszowski\Runsite\Models\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;
use Artisan;

class Model extends Eloquent
{
    protected $table = 'rs_models';
    protected $fillable = ['name', 'display_name', 'display_name_plural'];

    public $modelName = 'models';

    public $fields = [
      'name'                  => ['controller'=> 'text', 'controller_variant'=>'default', 'id'=>'name',                'maxlength'=>255, 'show_in_list'=>true, 'label'=>'name'],
      'display_name'          => ['controller'=> 'text', 'controller_variant'=>'default', 'id'=>'display_name',        'maxlength'=>255, 'show_in_list'=>true, 'label'=>'display_name'],
      'display_name_plural'   => ['controller'=> 'text', 'controller_variant'=>'default', 'id'=>'display_name_plural', 'maxlength'=>255, 'show_in_list'=>true, 'label'=>'display_name_plural'],
    ];

    protected $defaultFields = [

        'node_id' => [
          'type' => 'integer',
          'references' => [
            'field_name' => 'id',
            'table_name' => 'rs_nodes',
          ],
        ],

        'parent_id' => [
          'type' => 'integer',
          'references' => [
            'field_name' => 'id',
            'table_name' => 'rs_nodes',
          ],
        ],

        'language_id' => [
          'type' => 'integer',
          'references' => [
            'field_name' => 'id',
            'table_name' => 'rs_languages',
          ],
        ],

        'position' => [
          'type' => 'integer',
          'references' => null,
        ],

    ];

    public function settings()
    {
      return $this->belongsTo('\Goszowski\Runsite\Models\Model\Setting');
    }

    public static function create(array $attributes = [], $inDatabase = false)
    {
      if($inDatabase)
      {
        return parent::query()->create($attributes);
      }

      $dateNow = Carbon::now()->format('Y_m_d_His');
      $modelName = array_get($attributes, 'name');
      $fileName = $dateNow . '_create_model_' . $modelName . '.php';
      $migrationName = 'CreateModel' . studly_case($modelName);
      $model = new Model;

      $modelFields = '';
      foreach($attributes as $field=>$value)
      {
        if(in_array($field, $model->fillable))
        {
          $modelFields .= '            "'.$field.'" => "'.$value.'",' . "\n";
        }
      }

      $fields = '';
      foreach($model->defaultFields as $fieldName=>$fieldOptions)
      {
          $fields .= '            $table->'.$fieldOptions['type'].'(\''.$fieldName.'\')';
          if($fieldOptions['references'])
          {
            $fields .= '->references(\''.$fieldOptions['references']['field_name'].'\')->on(\''.$fieldOptions['references']['table_name'].'\')';
          }
          $fields .= ";\n";
      }

      $migration = file_get_contents(__DIR__ . '/../../resources/stubs/migrations/model/create.stub');
      $migration = str_replace('%%MigrationName%%', $migrationName, $migration);
      $migration = str_replace('%%modelFields%%', $modelFields, $migration);
      $migration = str_replace('%%TableName%%', str_plural($modelName), $migration);
      $migration = str_replace('%%Fields%%', $fields, $migration);
      file_put_contents(database_path('/migrations/') . $fileName, $migration);

      return Artisan::call('migrate');
    }


    public function update(array $attributes = [], array $options = [], $inDatabase = false)
    {
      if($inDatabase)
      {
        return parent::update($attributes, $options);
      }

      if($this->isModified($attributes))
      {
        $dateNow = Carbon::now()->format('Y_m_d_His');
        $modelName = $this->name;
        $fileName = $dateNow . '_update_model_' . $modelName . '.php';
        $migrationName = 'UpdateModel' . studly_case($modelName);

        $modelFields = '';
        foreach($attributes as $field=>$value)
        {
          if(in_array($field, $this->fillable) and $this->{$field} != $value)
          {
            $modelFields .= '            "'.$field.'" => "'.$value.'",' . "\n";
          }
        }

        $migration = file_get_contents(__DIR__ . '/../../resources/stubs/migrations/model/update.stub');
        $migration = str_replace('%%MigrationName%%', $migrationName, $migration);
        $migration = str_replace('%%modelFields%%', $modelFields, $migration);
        $migration = str_replace('%%modelName%%', $modelName, $migration);

        if(array_get($attributes, 'name') != $modelName)
        {

          $renameSchema = 'Schema::rename("'.str_plural($modelName).'", "'.str_plural(array_get($attributes, 'name')).'");';
          $migration = str_replace('%%renameSchema%%', $renameSchema, $migration);
        }
        else
        {
          $migration = str_replace('%%renameSchema%%', '', $migration);
        }

        file_put_contents(database_path('/migrations/') . $fileName, $migration);
        return Artisan::call('migrate');
      }
    }

    public function isModified($attributes)
    {
      foreach($attributes as $attr=>$val)
      {
        if(in_array($attr, $this->fillable) and $this->{$attr} != $val)
        {
          return true;
          break;
        }
      }
      return false;
    }

    public function delete($inDatabase = false)
    {
      if($inDatabase)
      {
        return parent::delete();
      }

      $dateNow = Carbon::now()->format('Y_m_d_His');
      $modelName = $this->name;
      $fileName = $dateNow . '_delete_model_' . $modelName . '.php';
      $migrationName = 'DeleteModel' . studly_case($modelName);

      $migration = file_get_contents(__DIR__ . '/../../resources/stubs/migrations/model/delete.stub');
      $migration = str_replace('%%MigrationName%%', $migrationName, $migration);
      $migration = str_replace('%%modelName%%', $modelName, $migration);
      $dropSchema = 'Schema::drop("'.str_plural($modelName).'");;';
      $migration = str_replace('%%dropSchema%%', $dropSchema, $migration);

      file_put_contents(database_path('/migrations/') . $fileName, $migration);
      return Artisan::call('migrate');
    }
}
