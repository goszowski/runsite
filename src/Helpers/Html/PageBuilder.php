<?php

namespace Goszowski\Runsite\Helpers\Html;


class PageBuilder {

  public function buildIndex($model, $items)
  {
    $model = new $model;
    return view('runsite::page-builder.index', compact('model', 'items'));
  }

  public function buildCreate($model)
  {
    $model = new $model;
    return view('runsite::page-builder.create', compact('model'));
  }

  public function buildEdit($model)
  {
    return view('runsite::page-builder.edit', compact('model'));
  }
}
