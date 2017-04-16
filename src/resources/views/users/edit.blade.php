@extends('runsite::partials.crud.edit')

@section('crud-title', trans('runsite::main.Edit') . ' ' . trans('runsite::user.app_name'))
@section('crud-action', route('runsite.users.update', $user->id))

@section('crud-content')
  @include('runsite::users.form', compact('user'))
@endsection
