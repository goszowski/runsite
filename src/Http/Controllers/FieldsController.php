<?php

namespace Goszowski\Runsite\Http\Controllers;

use Goszowski\Runsite\Http\Controllers\RunsiteController;

class FieldsController extends RunsiteController
{
    public function index($model_id)
    {
        return view('runsite::fields.index');
    }

    public function create($model_id)
    {
        return view('runsite::fields.create');
    }

    public function edit($model_id, $id)
    {
        return view('runsite::fields.edit');
    }

    public function show($model_id)
    {
        return abort(404);
    }

    public function store($model_id, Request $request)
    {
        $this->validate($request, [

        ]);

        return redirect()->route('runsite.fields.index');
    }

    public function update($model_id, $id)
    {
        return redirect()->route('runsite.fields.index');
    }

    public function destroy($model_id, $id)
    {
        return redirect()->route('runsite.fields.index');
    }
}
