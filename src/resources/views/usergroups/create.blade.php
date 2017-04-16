@extends('runsite::partials.crud.create')

@section('crud-title', trans('runsite::main.Create new') . ' ' . trans('runsite::usergroup.app_name'))
@section('crud-action', route('runsite.usergroups.store'))

@section('crud-content')
  @include('runsite::usergroups.form', compact('group'))
@endsection
