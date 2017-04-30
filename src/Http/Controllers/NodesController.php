<?php

namespace Goszowski\Runsite\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Goszowski\Runsite\Models\Node\Node;
use Goszowski\Runsite\Models\Language;
use Goszowski\Runsite\Models\Model\Model;
use Goszowski\Runsite\Models\Dynamic;
use Illuminate\Http\Request;

class NodesController extends BaseController
{

    public function create($parent_id, $model_id)
    {
      $languages = Language::get();
      $model = Model::findOrFail($model_id);
      return view('runsite::nodes.create', compact('languages', 'model', 'parent_id'));
    }

    public function edit($id, $model_id=null)
    {
      $node = Node::findOrFail($id);
      $languages = Language::get();

      $subModels = Model::get(); // TODO
      $activeSubModel = $subModels->first();
      if($model_id)
      {
        $activeSubModel = Model::findOrFail($model_id);
      }
      $children = (new Dynamic(str_plural($activeSubModel->name)))->where('parent_id', $id)->where('language_id', 1)->paginate();

      return view('runsite::nodes.edit', compact('node', 'languages', 'subModels', 'activeSubModel', 'children'));
    }

    public function update($id, Request $request)
    {
      $node = Node::findOrFail($id);
      $languages = Language::get();

      foreach($request->all()['languages'] as $language_id=>$fields)
      {
        $dynamic = $node->dynamic()->where('node_id', $node->id)->where('language_id', $language_id)->first();

        foreach($fields as $field=>$value)
        {
          $dynamic->{$field} = $value;
        }

        $dynamic->save();
      }

      return redirect()->route('runsite.nodes.edit', $node->id);
    }

    public function store(Request $request)
    {
      $data = [
        'parent_id' => $request->input('parent_id'),
        'model_id' => $request->input('model_id'),
      ];

      foreach($request->all()['languages'] as $language_id=>$fields)
      {
        foreach($fields as $field=>$value)
        {
          $data['values'][$language_id][$field] = $value;
        }
      }
      Node::create($data);

      return redirect()->route('runsite.nodes.edit', $request->input('parent_id'));
    }
}
