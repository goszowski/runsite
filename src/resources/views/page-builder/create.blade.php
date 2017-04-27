@extends('runsite::layouts.app')
@section('content')
    <div class="panel panel-default">
      <div class="panel-heading">{{$model->modelName}}</div>
      <div class="panel-body">
        <form action="{{route('runsite.'.$model->modelName.'.store')}}" method="post" >
          {{csrf_field()}}
          @include('runsite::page-builder.form')
          <button type="submit" class="btn btn-primary rippler rippler-default"><i class="icofont icofont-check"></i> {{trans('runsite::main.Create')}}</button>
        </form>
      </div>
    </div>
@endsection
