<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

use Config;

class RewriteAppConfig {

  public $message = 'Rewrining default configuration in config/app.php';

  public function handle()
  {
    return Config::write('auth.providers.users', [
      'driver' => 'eloquent',
      'model' => \Goszowski\Runsite\Models\User\User::class,
    ]);
  }
}
