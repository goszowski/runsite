@extends('runsite::partials.crud.create')

@section('crud-title', trans('runsite::main.Create new') . ' ' . trans('runsite::user.app_name'))
@section('crud-action', route('runsite.users.store'))

@section('crud-content')
  @include('runsite::users.form', compact('user'))
@endsection
