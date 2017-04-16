<?php

namespace Goszowski\Runsite\Console;

use Illuminate\Console\Command;

class Setup extends Command
{

    protected $signature = 'runsite:setup';
    protected $description = 'Setup Runsite';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->comment('Runsite Setup');
        $yes = $this->ask('Run instalation? (y/n)');
        if($yes)
        {
          $this->comment('Instalation...');
          $this->comment('Instalation complete');
        }
    }
}
