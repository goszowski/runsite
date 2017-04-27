@extends('runsite::layouts.resources')

@section('app')
  <div class="auth-wrapper">
    <div class="inner">
      <h1 class="text-center"><b>run</b>site</h1>
        @yield('content')
      </div>
    </div>

  </div>
@endsection
