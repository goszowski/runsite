<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

use Goszowski\Runsite\Models\User\Group;

class CreateAdminUserGroup {

  public $message = 'Creating development user group';

  public function handle()
  {
    return Group::create(['name' => 'Developer']);
  }
}
