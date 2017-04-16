@extends('runsite::partials.crud.edit')

@section('crud-title', trans('runsite::main.Edit') . ' ' . trans('runsite::language.app_name'))
@section('crud-action', route('runsite.languages.update', $language->id))

@section('crud-content')
  @include('runsite::languages.form', compact('language'))
@endsection
