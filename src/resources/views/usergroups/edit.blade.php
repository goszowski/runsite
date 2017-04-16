@extends('runsite::partials.crud.edit')

@section('crud-title', trans('runsite::main.Edit') . ' ' . trans('runsite::usergroup.app_name'))
@section('crud-action', route('runsite.usergroups.update', $group->id))

@section('crud-content')
  @include('runsite::usergroups.form', compact('user'))
@endsection
