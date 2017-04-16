@extends('runsite::partials.crud.create')

@section('crud-title', trans('runsite::main.Create new') . ' ' . trans('runsite::model.app_name'))
@section('crud-action', '/runsite/admin/models')
@section('crud-method', 'post')

@section('crud-content')
  @include('runsite::models.form', compact('model'))
@endsection
