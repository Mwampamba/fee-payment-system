<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="mb-4 text-center">
   <a href="{{ route('getLogin')}}"><h2>UAUT PAYMENT SYSTEM</h2></a> 
  </div>
  <div class="card">
    <div class="card-body">
      @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
      @endif
      @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
      @endif
      <p class="login-box-msg">Sign in to access your account</p>
      <form action="{{ route('postLogin')}}" method="post">
        @csrf
        <div class="input-group mb-2">
          <input type="email" name="email" class="form-control" placeholder="Enter your email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-2">
          <input type="password" name="password" class="form-control" placeholder="Enter your password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
          </div> 
        </div>
        <div class="col-12">
            <p class="mb-3">
              <a href="{{route('getForgotPassword')}}" class="form-control float-right">Have you forgot the password? start here</a>
            </p>
          </div>
      </form>    
    </div> 
  </div>
</div>

<!-- jQuery -->
<script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
