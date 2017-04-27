<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

use Artisan;

class ArtisanMigrate {

  public $message = 'Runing migrations';

  public function handle()
  {
    return Artisan::call('migrate');
  }
}
