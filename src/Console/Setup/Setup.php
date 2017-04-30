<?php

namespace Goszowski\Runsite\Console\Setup;

use Illuminate\Console\Command;
use Artisan;
use DB;

use Goszowski\Runsite\Console\Setup\Steps\TruncateAppMigrationsFolder;
use Goszowski\Runsite\Console\Setup\Steps\RewriteAppConfig;
use Goszowski\Runsite\Console\Setup\Steps\RemoveAppUserModel;
use Goszowski\Runsite\Console\Setup\Steps\ArtisanMigrate;
use Goszowski\Runsite\Console\Setup\Steps\CreateAdminUserGroup;
use Goszowski\Runsite\Console\Setup\Steps\CreateAdminUser;
use Goszowski\Runsite\Console\Setup\Steps\ArtisanVendorPublish;
use Goszowski\Runsite\Console\Setup\Steps\CreateIndexModel;
use Goszowski\Runsite\Console\Setup\Steps\CreateDefaultFieldsOfIndexModel;
use Goszowski\Runsite\Console\Setup\Steps\CreateIndexNode;
use Goszowski\Runsite\Console\Setup\Steps\CreateLanguage;

class Setup extends Command
{

    protected $signature = 'runsite:setup';
    protected $description = 'Setup Runsite';

    protected $database = '';

    protected $sleep = 100000;
    protected $steps = [
      TruncateAppMigrationsFolder::class,
      RewriteAppConfig::class,
      RemoveAppUserModel::class,
      ArtisanMigrate::class,
      CreateAdminUserGroup::class,
      CreateAdminUser::class,
      ArtisanVendorPublish::class,
      CreateIndexModel::class,
      CreateDefaultFieldsOfIndexModel::class,
      CreateLanguage::class,
      CreateIndexNode::class,
      ArtisanMigrate::class,
    ];

    public function __construct()
    {
        parent::__construct();

        $this->database = env('DB_DATABASE');
    }

    public function handle()
    {
        $this->comment('Runsite Setup');

        if($this->tablesExists())
        {
          if ($this->confirm('Database "'.$this->database.'" is not empty. Do you want to remove all tables in this database?')) {
              $this->dropAllTablesInDb();
          }
          else
          {
            $this->comment('Instalation canceled');
            return false;
          }
        }


        $this->comment('Instalation...');

        $bar = $this->output->createProgressBar(count($this->steps));
        $bar->setFormatDefinition('runsite', '  %current%/%max% [%bar%] %percent:3s%% -- %message%');
        $bar->setFormat('runsite');
        $bar->setMessage('Preparing');
        $bar->start();

        foreach($this->steps as $class)
        {
          $class = new $class;
          $class->handle();

          $bar->setMessage($class->message);
          $bar->advance();
          usleep($this->sleep);
        }

        $bar->setMessage('Instalation complete!');
        $bar->finish();

        $this->comment('');
        $this->comment('Thank you for trying!');
        $this->comment('We really need support in this project. You can create a fork and develop the project together with us, giving us the pull-requests.');

    }

    public function isEmail($email)
    {
      return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function strongPassword($password)
    {
      return strlen($password) >= 6;
    }

    public function tablesExists()
    {
      $colname = 'Tables_in_' . $this->database;
      $tables = DB::select('SHOW TABLES');

      return count($tables);
    }

    public function dropAllTablesInDb()
    {
      $colname = 'Tables_in_' . $this->database;
      $tables = DB::select('SHOW TABLES');
      $droplist = [];

      foreach($tables as $table) {
          $droplist[] = $table->$colname;
      }

      $droplist = implode(',', $droplist);
      if($droplist)
      {
        DB::beginTransaction();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement("DROP TABLE $droplist");
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        DB::commit();
      }
    }

}
