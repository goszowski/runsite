<?php

namespace Goszowski\Runsite\Console\Model;

use Illuminate\Console\Command;
use Goszowski\Runsite\Models\Model\Model;

class ModelsList extends Command
{

    protected $signature = 'model:list';
    protected $description = 'Listing models';

    public function handle()
    {
        $headers = ['Id', 'Name', 'Display Name', 'Display Name Plural', 'Created At', 'Updated At'];
        $models = Model::get();
        $this->table($headers, $models);
    }

}
