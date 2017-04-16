@extends('runsite::partials.crud.edit')

@section('crud-title', 'Update model')
@section('crud-action', route('runsite.models.update', $model->id))
@section('crud-method', 'post')

@section('crud-content')
  @include('runsite::models.form', compact('model'))
@endsection

@section('app_menu')
  <ul class="nav navbar-nav">
    <li class="active"><a class="rippler rippler-inverse" href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Model</a></li>
    <li><a class="rippler rippler-inverse" href="#"><i class="fa fa-th-list" aria-hidden="true"></i> Fields</a></li>
    <li><a class="rippler rippler-inverse" href="#"><i class="fa fa-sitemap" aria-hidden="true"></i> Dependencies</a></li>
  </ul>
@endsection
