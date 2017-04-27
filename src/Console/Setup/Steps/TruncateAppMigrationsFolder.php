<?php

namespace Goszowski\Runsite\Console\Setup\Steps;

class TruncateAppMigrationsFolder {

  protected $appMigrationsPath;
  public $message = 'Removing all default migrations in database/migrations folder';

  public function __construct()
  {
    $this->appMigrationsPath = database_path('/migrations');
  }

  public function handle()
  {
    $files = scandir($this->appMigrationsPath);
    foreach($files as $file)
    {
      if($file != '.' and $file != '..')
      {
        unlink($this->appMigrationsPath . '/' . $file);
      }
    }

    return true;
  }
}
