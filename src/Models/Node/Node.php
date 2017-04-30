<?php

namespace Goszowski\Runsite\Models\Node;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Goszowski\Runsite\Models\Model\Model;
use Goszowski\Runsite\Models\Dynamic;
use Goszowski\Runsite\Models\Language;
use Goszowski\Runsite\Models\Node\Path;
use DateTime;
use Artisan;
use Facades\ {
  Goszowski\Stub\Stub
};

class Node extends Eloquent
{
    protected $table = 'rs_nodes';
    protected $fillable = ['parent_id', 'model_id'];
    protected $values = null;
    protected $breadcrumb = [];

    public function settings()
    {
      return $this->hasOne('\Goszowski\Runsite\Models\Node\Setting', 'node_id');
    }

    public function paths()
    {
      return $this->hasMany('\Goszowski\Runsite\Models\Node\Path', 'node_id');
    }

    public function path()
    {
      return $this->hasOne('\Goszowski\Runsite\Models\Node\Path', 'node_id')->orderBy('created_at', 'desc');
    }

    public function model()
    {
      return $this->belongsTo('\Goszowski\Runsite\Models\Model\Model');
    }

    public function parent()
    {
      return $this->belongsTo('\Goszowski\Runsite\Models\Node\Node', 'parent_id');
    }

    public function values()
    {
      return $this->dynamic()->where('node_id', $this->id)->get();
    }

    public function getValue($language_id, $field_name)
    {
      if(!$this->values)
      {
        $this->values = $this->values();
      }

      return $this->values->where('language_id', $language_id)->first()->{$field_name};
    }

    public function dynamic()
    {
      return new Dynamic(str_plural($this->model->name));
    }




    public static function create(array $attributes = [], $inDatabase = false)
    {
      if($inDatabase)
      {
        $node = parent::query()->create([
          'parent_id' => array_get($attributes, 'parent_id'),
          'model_id' => array_get($attributes, 'model_id'),
        ]);

        // Creating path
        Path::create([
          'node_id' => $node->id,
          'name' => $node->generatePath($attributes),
        ]);

        if(isset($attributes['values']))
        {
          $position = $node->setPosition();

          $languages = Language::get();

          foreach($languages as $language)
          {
            $dynamic = new Dynamic(str_plural($node->model->name));

            $dynamic->node_id = $node->id;
            $dynamic->parent_id = $node->parent_id;
            $dynamic->language_id = $language->id;
            $dynamic->position = $position;
            foreach($node->model->fields() as $field)
            {
              $dynamic->{$field->name} = array_get($attributes['values'][$language->id], $field->name);
            }

            $dynamic->save([], true);
          }
        }

        return $node;

      }

      // Last node in database. Needs for get last id and generate new migration
      $lastNode = Node::orderBy('id', 'desc')->first();
      $model = Model::findOrFail(array_get($attributes, 'model_id'));
      $newId = count($lastNode) ? $lastNode->id + 1 : 1;

      $dateNow = (new DateTime)->format('Y_m_d_His').microtime(true);

      $fileName = $dateNow . '_create_node_' . $newId . '.php';
      $migrationName = 'CreateNode' . studly_case($newId);

      $stub = Stub::load(__DIR__ . '/../../resources/stubs/migrations/node/create.stub');

      $stub->replace('MigrationName', $migrationName);
      $stub->replace('ParentId', array_get($attributes, 'parent_id') ?: 'null');
      $stub->replace('ModelName', $model->name);

      $fields = '';
      if(isset($attributes['values']))
      {

        $languages = Language::get();
        $fields .= '          \'values\' => [' . "\n";
        foreach($languages as $language)
        {
          $fields .= '            ' . $language->id . ' => [' . "\n";
          foreach($model->fields() as $field)
          {
            $fields .= '              \''.$field->name.'\' => '. $field->type()::setValue(array_get($attributes['values'][$language->id], $field->name)) .",\n";
          }
          $fields .= "            ],\n";
        }
        $fields .= "          ],\n";
      }
      $stub->replace('Fields', $fields);

      $stub->store(database_path('/migrations'), $fileName);

      Artisan::call('migrate');
    }

    public function generatePath(array $attributes = [])
    {
      $base = isset($attributes['name']) ? $attributes['name'] : $this->id;
      if($this->id == 1)
      {
        $base = null;
      }

      $root = $this->parent ? $this->parent->path->name . '/' : '/';
      $path = $root . $base;

      while(Path::where('name', $path)->where('node_id', $this->id)->count())
      {
        $path .= Node::where('parent_id', $this->parent_id)->count();
      }

      return $path;
    }

    public function setPosition()
    {
      $position = 1;
      $last = $this->dynamic()->where('parent_id', $this->id)->orderBy('position', 'desc')->first();

      if(count($last))
      {
        $position = $last->position + 1;
      }

      return $position;
    }

    public function breadcrumbHtml($id=null)
    {
      $node = $id ? Node::findOrFail($id) : $this;
      $this->breadcrumb[] = $node;
      if($node->parent_id)
      {
        return $this->breadcrumbHtml($node->parent_id);
      }

      $breadcrumb = $this->breadcrumb;
      krsort($breadcrumb);

      return view('runsite::nodes.partials.breadcrumb', [
        'breadcrumb' => $breadcrumb,
      ]);
    }
}
