<?php

namespace Goszowski\Runsite\Http\Controllers;

use Goszowski\Runsite\Http\Controllers\RunsiteController;
use Goszowski\Runsite\Models\Model\Model;
use Goszowski\Runsite\Models\Field\Field;
use Goszowski\Runsite\Helpers\Alert;
use Illuminate\Http\Request;
use Facades\ {
  Goszowski\Runsite\Helpers\Html\PageBuilder,
  Goszowski\Runsite\Helpers\Database\MigrationBuilder
};

class ModelsController extends RunsiteController
{
    public function index()
    {
        $items = Model::paginate();
        return PageBuilder::buildIndex(Model::class, $items);
    }

    public function create()
    {
        return PageBuilder::buildCreate(Model::class);
    }

    public function edit($id)
    {
        $model = Model::find($id);
        return PageBuilder::buildEdit($model);
    }

    public function show()
    {
        return abort(404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|max:255|unique:rs_models',
          'display_name' => 'required|max:255',
          'display_name_plural' => 'required|max:255',
        ]);

        Model::create($request->all());

        $model = Model::where('name', array_get($request->all(), 'name'))->first();

        Field::create([
          'model_id' => $model->id,
          'type_id' => 4,
          'name' => 'is_active',
          'display_name' => 'Active',
          'hint' => '',
        ]);

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

        $model = Model::find($id);

        $model->update($request->all());
        // MigrationBuilder::updateModel($model->name, 'Goszowski\Runsite\Models\Model\Model', $request->all());
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
