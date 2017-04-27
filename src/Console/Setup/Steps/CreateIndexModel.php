<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

use Goszowski\Runsite\Models\Model\Model;

class CreateIndexModel {

  public $message = 'Creating index dynamic model';

  public function handle()
  {
    Model::create([
      'name' => 'index',
      'display_name' => 'Index',
      'display_name_plural' => 'Index',
    ]);
  }
}
