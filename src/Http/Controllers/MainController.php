<?php

namespace Goszowski\Runsite\Http\Controllers;

use Goszowski\Runsite\Http\Controllers\RunsiteController;

class MainController extends RunsiteController
{
    public function index()
    {
        return view('runsite::main');
    }
}
