@extends('runsite::layouts.app')
@section('content')
    <div class="panel panel-default">
      <div class="panel-heading">{{$model->modelName}}</div>
      <div class="panel-body">
        <form action="{{route('runsite.'.$model->modelName.'.update', $model->id)}}" method="post" >
          {{csrf_field()}}
          {{method_field('PATCH')}}
          @include('runsite::page-builder.form')
          <button type="submit" class="btn btn-primary rippler rippler-default"><i class="icofont icofont-check"></i> Update</button>
        </form>
      </div>
    </div>
@endsection
