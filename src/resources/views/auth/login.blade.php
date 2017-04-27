@extends('runsite::layouts.auth')

@section('content')
  <form role="form" method="POST" action="{{ url('/runsite/admin/auth/login') }}">
      {{ csrf_field() }}

      <div class="row text-center">
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="control-label">E-Mail Address</label>
              <input id="email" type="email" class="form-control text-center" name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="control-label">Password</label>
              <input id="password" type="password" class="form-control text-center" name="password" required>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
        </div>
      </div>

      <div class="text-center">
        {!! Recaptcha::render() !!}
      </div>



      <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
              <div class="checkbox checkbox-primary">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''}}>
                <label for="remember">Remember Me</label>
              </div>
          </div>
      </div>

      <div class="form-group">
          <div class="col-md-8 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                  Login
              </button>

              <a class="btn btn-link" href="{{ url('/admin/auth/password/reset') }}">
                  Forgot Your Password?
              </a>
          </div>
      </div>


  </form>
@endsection
