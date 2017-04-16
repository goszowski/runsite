@extends('runsite::partials.crud.create')

@section('crud-title', trans('runsite::main.Create new') . ' ' . trans('runsite::language.app_name'))
@section('crud-action', route('runsite.languages.store'))

@section('crud-content')
  @include('runsite::languages.form', compact('language'))
@endsection
