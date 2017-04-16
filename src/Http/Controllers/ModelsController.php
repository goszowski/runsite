<?php

namespace Goszowski\Runsite\Http\Controllers;

use Goszowski\Runsite\Http\Controllers\RunsiteController;
use Goszowski\Runsite\Models\Model\Model;
use Goszowski\Runsite\Helpers\Alert;
use Goszowski\Runsite\Helpers\MigrationBuilder;
use Illuminate\Http\Request;

class ModelsController extends RunsiteController
{
    public function index()
    {
        $items = Model::paginate();
        return view('runsite::models.index', compact('items'));
    }

    public function create(Model $model)
    {
        return view('runsite::models.create', compact('model'));
    }

    public function edit($id)
    {
        $model = Model::find($id);
        return view('runsite::models.edit', compact('model'));
    }

    public function show()
    {
        return abort(404);
    }

    public function store(Request $request, MigrationBuilder $migrationBuilder)
    {
        $this->validate($request, [
          'name' => 'required|max:255|unique:rs_models',
          'display_name' => 'required|max:255',
          'display_name_plural' => 'required|max:255',
        ]);

        Model::create($request->all());

        // $migrationBuilder->createTable(str_plural($request->input('name')));

        Alert::success(trans('runsite::main.created_successful'));

        return redirect()->route('runsite.models.index');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
          'name' => 'required|max:255|unique:rs_models,name,'.$id,
          'display_name' => 'required|max:255',
          'display_name_plural' => 'required|max:255',
        ]);

        Model::find($id)->update($request->all());
        Alert::success(trans('runsite::main.updated_successful'));

        return redirect()->route('runsite.models.index');
    }

    public function destroy($id)
    {
        Model::find($id)->delete();
        Alert::success(trans('runsite::main.deleted_successful'));
        return redirect()->route('runsite.models.index');
    }
}
