<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

use Goszowski\Runsite\Models\Language;

class CreateLanguage {

  public $message = 'Creating first language';

  public function handle()
  {
    Language::create([
      'locale' => 'en',
      'country_code' => 'us',
      'display_name' => 'English',
      'is_active' => true,
    ]);

    Language::create([
      'locale' => 'uk',
      'country_code' => 'ua',
      'display_name' => 'Українська',
      'is_active' => true,
    ]);
  }
}
