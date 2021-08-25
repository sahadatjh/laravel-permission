@extends('backend.auth.auth_master')
@section('auth-content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>LV-PERMISSION</b></a>
      </div>
      <div class="card-body">
        {{-- <p class="login-box-msg">Sign in to start your session</p> --}}
        @include('backend.partials.messages')
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
          <div class="input-group mb-3">
            <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Username" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-7">
              <div class="icheck-primary">
                <input type="checkbox" id="remember"name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-5">
                @if (Route::has('password.request'))
                    <a href="{{ route('admin.password.request') }}">Forgot password?</a>
                @endif
            </div>
            <!-- /.col -->
          </div>
          
  
          <p class="mb-1">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              
            </p>
        </form>
       
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
@endsection