<?php

namespace Goszowski\Runsite\Helpers;

class MigrationBuilder
{
    protected $table = null;
    protected $fileName = null;
    protected $fields = null;
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


    public function createTable($name)
    {
        $this->table = $name;
        $this->fileName = date('Y_m_d_His') . '_create_' . $name . '_table.php';
        $this->migrationName = 'Create' . studly_case($name) . 'Table';

        return $this->generate();
    }

    public function generate()
    {
        $migration = file_get_contents(__DIR__ . '/../resources/stubs/migration.stub');

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

        $migration = str_replace('%%MigrationName%%', $this->migrationName, $migration);
        $migration = str_replace('%%TableName%%', $this->table, $migration);
        $migration = str_replace('%%Fields%%', $fields, $migration);

        file_put_contents(database_path('/migrations/') . $this->fileName, $migration);
    }
}
