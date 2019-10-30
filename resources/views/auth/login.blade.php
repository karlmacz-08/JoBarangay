@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><h3>Login</h3></div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
              <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>

              <div class="col-md-6">
                <input id="mobile_number" type="number" class="form-control" name="mobile_number" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('mobile_number'))
                <span class="help-block">
                  <strong>{{ $errors->first('mobile_number') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Password</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Tandaan mo ako
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Login
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                  Nakalimutan ang Password?
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
