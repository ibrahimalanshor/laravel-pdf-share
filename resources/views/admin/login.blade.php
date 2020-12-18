<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  @include('admin._includes.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('admin.index') }}"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible">
          {{ session('error') }}
          <button class="close" data-dismiss="alert">&times;</button>
        </div>
      @endif


      <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>

          @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

          @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="remember" id="remember" class="custom-control-input">
              <label for="remember" class="custom-control-label">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('admin._includes.foot')

</body>
</html>
