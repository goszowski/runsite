<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

use Artisan;

class ArtisanVendorPublish {

  public $message = 'Publishing vendors';

  public function handle()
  {
    return Artisan::call('vendor:publish');
  }
}
