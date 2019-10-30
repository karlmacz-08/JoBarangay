@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><h3>Rehistro</h3></div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group radio-form{{ $errors->has('type') ? ' has-error' : '' }}">
              <label for="type" class="col-md-4 control-label">Klase</label>

              <div class="col-md-6">
                <input id="app" class="type" type="radio" name="type" value="Applicant" required autofocus>Aplikante<span class="split"></span>
                <input id="emp" class="type" type="radio" name="type" value="Employer" required autofocus>Employer<br>

                @if ($errors->has('type'))
                <span class="help-block">
                  <strong>{{ $errors->first('type') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
              <label for="first_name" class="col-md-4 control-label">Pangalan</label>

              <div class="col-md-6">
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                @if ($errors->has('first_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('first_name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            
            <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
              <label for="middle_name" class="col-md-4 control-label">Gitnang Pangalan</label>

              <div class="col-md-6">
                <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}" autofocus>

                @if ($errors->has('middle_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('middle_name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <label for="last_name" class="col-md-4 control-label">Apelyido</label>

              <div class="col-md-6">
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                @if ($errors->has('last_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('last_name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
              <label for="birth_date" class="col-md-4 control-label">Kaarawan</label>

              <div class="col-md-6">
                <input id="birth_date" class="form-control" type="text" autocomplete="off" name="birth_date" value="{{ old('birth_date') }}" placeholder="ex. January 1, 1650" required autofocus>

                @if ($errors->has('birth_date'))
                <span class="help-block">
                  <strong>{{ $errors->first('birth_date') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group radio-form{{ $errors->has('sex') ? ' has-error' : '' }}">
              <label for="sex" class="col-md-4 control-label">Kasarian</label>

              <div class="col-md-6">
                <input class="sex" type="radio" autocomplete="off" name="sex" value="Male" required autofocus>Lalaki<span class="split"></span>
                <input class="sex" type="radio" autocomplete="off" name="sex" value="Female" required autofocus>Babae<br>

                @if ($errors->has('sex'))
                <span class="help-block">
                  <strong>{{ $errors->first('sex') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
              <label for="mobile_number" class="col-md-4 control-label">Mobile Number</label>

              <div class="col-md-6">
                <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="0906 XXX XXXX" required autofocus>

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
              <label for="password-confirm" class="col-md-4 control-label">Kumpirmahin ang Password</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Rehistro
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/register.js') }}"></script>
@endsection
