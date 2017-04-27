<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

class RemoveAppUserModel {

  public $message = 'Removing default App\User model';

  public function handle()
  {
    return (file_exists(app_path('User.php'))) ? unlink(app_path('User.php')) : true;
  }
}
