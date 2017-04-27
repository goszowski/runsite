<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

use Goszowski\Runsite\Models\User\User;

class CreateAdminUser {

  public $message = 'Creating developer';

  public function handle()
  {
    return User::create([
      'name' => '',
      'email' => 'exemple@domain.com',
      'password' => bcrypt('secret'),
      'group_id' => 1,
    ]);
  }
}
