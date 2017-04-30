<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

use Goszowski\Runsite\Models\Node\Node;

class CreateIndexNode {

  public $message = 'Creating index node';

  public function handle()
  {
    Node::create([
      'parent_id' => null,
      'model_id' => 1,
      'values' => [
        1 => [
          'is_active' => true,
          'name' => 'Website name',
          'seo_title' => 'The main page title',
          'seo_keywords' => 'The main page keywords',
          'seo_description' => 'The main page description',
        ],

        2 => [
          'is_active' => true,
          'name' => 'Website name UKR',
          'seo_title' => 'The main page title',
          'seo_keywords' => 'The main page keywords',
          'seo_description' => 'The main page description',
        ]
      ]
    ]);
  }
}
