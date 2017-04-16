@extends('runsite::layouts.app')
@section('content')
    <div class="panel panel-default">
      <div class="panel-heading">@yield('crud-title')</div>
      <div class="panel-body">
        <form action="@yield('crud-action')" method="post" >
          {{csrf_field()}}
          @yield('crud-content')
          <button type="submit" class="btn btn-primary rippler rippler-default"><i class="fa fa-check"></i> {{trans('runsite::main.Create')}}</button>
        </form>
      </div>
    </div>
@endsection
