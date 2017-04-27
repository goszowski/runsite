<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

use Goszowski\Runsite\Models\Model\Model;
use Goszowski\Runsite\Models\Field\Field;

class CreateDefaultFieldsOfIndexModel {

  public $message = 'Creating default fields of index model';

  public function handle()
  {
    $model = Model::where('name', 'index')->first();

    Field::create([
      'model_id' => $model->id,
      'type_id' => 4,
      'name' => 'is_active',
      'display_name' => 'Active',
      'hint' => '',
    ]);

    Field::create([
      'model_id' => $model->id,
      'type_id' => 5,
      'name' => 'name',
      'display_name' => 'Name',
      'hint' => '',
    ]);

    Field::create([
      'model_id' => $model->id,
      'type_id' => 5,
      'name' => 'seo_title',
      'display_name' => 'SEO Title',
      'hint' => '',
    ]);

    Field::create([
      'model_id' => $model->id,
      'type_id' => 5,
      'name' => 'seo_keywords',
      'display_name' => 'SEO Keywords',
      'hint' => '',
    ]);

    Field::create([
      'model_id' => $model->id,
      'type_id' => 5,
      'name' => 'seo_description',
      'display_name' => 'SEO Description',
      'hint' => '',
    ]);
  }
}
