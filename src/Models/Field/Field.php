<?php

namespace Goszowski\Runsite\Models\Field;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Artisan;
use Carbon\Carbon;
use DateTime;
use Goszowski\Runsite\Models\Model\Model;



use Facades\ {
  Goszowski\Stub\Stub,
  Goszowski\Runsite\Models\Field\Types\TypeInteger,
  Goszowski\Runsite\Models\Field\Types\TypeString,
  Goszowski\Runsite\Models\Field\Types\TypeBoolean
};


class Field extends Eloquent
{
    protected $table = 'rs_fields';
    protected $fillable = ['model_id', 'type_id', 'name', 'display_name', 'hint'];
    protected $modelsPath = '\Goszowski\Runsite\Models';

    public $types = [
      1 => TypeInteger::class,
      2 => TypeFloat::class,
      3 => TypeDecimal::class,
      4 => TypeBoolean::class,
      5 => TypeString::class,

    ];

    public function settings()
    {
      return $this->hasOne($this->modelsPath.'\Field\Setting', 'field_id');
    }


    public static function create(array $attributes = [], $inDatabase = false)
    {
      if($inDatabase)
      {
        return parent::query()->create($attributes);
      }

      $date_now = (new DateTime)->format('Y_m_d_His').microtime(true);
      $field_name = array_get($attributes, 'name');
      $model_id = array_get($attributes, 'model_id');
      $type_id = array_get($attributes, 'type_id');
      $model = Model::find($model_id);
      $file_name = $date_now . '_create_field_' . $field_name . '_for_model_' . $model->name . '.php';
      $migration_name = 'CreateField' . studly_case($field_name) . 'ForModel' . studly_case($model->name);

      $fieldModel = new Field;

      // $field_type = $fieldModel->types[$type_id]::migrationColumnType();migrationMethod

      $stub = Stub::load(__DIR__ . '/../../resources/stubs/migrations/field/create.stub');

      $stub->replace('MigrationName', $migration_name);
      $stub->replace('TableName', str_plural($model->name));
      $stub->replace('Index', '');
      $stub->replace('FieldName', $field_name);
      $stub->replace('FieldDispayName', array_get($attributes, 'display_name'));
      $stub->replace('FieldHint', array_get($attributes, 'hint'));
      $stub->replace('Field', $fieldModel->types[$type_id]::migrationMethod($field_name));
      $stub->replace('TypeId', $type_id);
      $stub->replace('ModelName', $model->name);

      $stub->store(database_path('/migrations'), $file_name);

      Artisan::call('migrate');
    }
}
