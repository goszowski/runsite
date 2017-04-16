<?php

namespace Goszowski\Runsite\Helpers\Database;

class MigrationBuilder {

  protected $exceptFields = [
    '_token',
    '_method',
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

  public function createModel($model, $dataUp)
  {
    $modelActive = new $model;

    $filename = date('Y_m_d_His') . '_store_in_' . $modelActive->modelName . '_table.php';
    $migrationName = 'StoreIn' . studly_case($modelActive->modelName) . 'Table';

    $tableName = str_plural(array_get($dataUp, 'name'));

    $up = $model . '::create([' . "\n";
    foreach($dataUp as $field=>$value)
    {
      if(!in_array($field, $this->exceptFields))
      {
        $up .= '            "'.$field.'" => "'.$value.'",' . "\n";
      }

    }
    $up .= '        ]);';

    $fields = '';
    foreach($this->defaultFields as $fieldName=>$fieldOptions)
    {
        $fields .= '            $table->'.$fieldOptions['type'].'(\''.$fieldName.'\')';
        if($fieldOptions['references'])
        {
          $fields .= '->references(\''.$fieldOptions['references']['field_name'].'\')->on(\''.$fieldOptions['references']['table_name'].'\')';
        }
        $fields .= ";\n";
    }

    $migration = file_get_contents(__DIR__ . '/../../resources/stubs/migration_model_store.stub');
    $migration = str_replace('%%MigrationName%%', $migrationName, $migration);
    $migration = str_replace('%%up%%', $up, $migration);
    $migration = str_replace('%%TableName%%', $tableName, $migration);
    $migration = str_replace('%%Fields%%', $fields, $migration);
    file_put_contents(database_path('/migrations/') . $filename, $migration);

  }

  public function updateModel($name, $model, $dataUp)
  {
    $modelActive = new $model;

    $filename = date('Y_m_d_His') . '_update_in_' . $modelActive->modelName . '_table.php';
    $migrationName = 'UpdateIn' . studly_case($modelActive->modelName) . 'Table';

    $tableName = str_plural(array_get($dataUp, 'name'));

    $up = $model . '::where(["name",  "'.$name.'"])->update([' . "\n";
    foreach($dataUp as $field=>$value)
    {
      if(!in_array($field, $this->exceptFields))
      {
        $up .= '            "'.$field.'" => "'.$value.'",' . "\n";
      }

    }
    $up .= '        ]);';

    $migration = file_get_contents(__DIR__ . '/../../resources/stubs/migration_model_update.stub');
    $migration = str_replace('%%MigrationName%%', $migrationName, $migration);
    $migration = str_replace('%%up%%', $up, $migration);

    $oldModel = $model::where('name', $name)->first();
    if($oldModel->name != $tableName)
    {
      
    }
    // $migration = str_replace('%%TableName%%', $tableName, $migration);
    // $migration = str_replace('%%Fields%%', $fields, $migration);
    file_put_contents(database_path('/migrations/') . $filename, $migration);
  }

  // public function generate($migrationName, $filename, $fields)
  // {
  //     $migration = file_get_contents(__DIR__ . '/../../resources/stubs/migration.stub');
  //
  //     $fieldsCode = '';
  //     foreach($fields as $fieldName=>$fieldValue)
  //     {
  //         $fieldsCode .= '            $table->'.$fieldOptions['type'].'(\''.$fieldName.'\')';
  //         if($fieldOptions['references'])
  //         {
  //           $fieldsCode .= '->references(\''.$fieldOptions['references']['field_name'].'\')->on(\''.$fieldOptions['references']['table_name'].'\')';
  //         }
  //         $fieldsCode .= ";\n";
  //     }
  //
  //     $migration = str_replace('%%MigrationName%%', $this->migrationName, $migration);
  //     $migration = str_replace('%%TableName%%', $this->table, $migration);
  //     $migration = str_replace('%%Fields%%', $fieldsCode, $migration);
  //
  //     file_put_contents(database_path('/migrations/') . $filename, $migration);
  // }

}
