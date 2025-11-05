@include('layout.partials.style')

<body class="hold-transition login-page" style="background-image: linear-gradient(#FF475A, #FFA477)">
<div class="login-box">
  <div class="login-logo">
    <a style="font-family: poppins; text-decoration: none; color: white" href="../../index2.html"><strong>Lorem</strong>Ipsum</a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="border-radius: 20px;">
    <div class="card-body login-card-body" style="border-radius: 20px; padding: 30px; box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.2)">
      <h4 class="header text-center" style="font-family: poppins; color: #1E3A8A"><strong>Welcome Back!</strong></h4>
      <p class="login-box-msg" style="font-family: poppins; font-size: 12px; color: gray">We missed you! Please enter your details.</p>

      <form action="/login" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name='email' id='email' style="font-family: poppins; font-size: 12px" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <div style="color: red; font-size: 12px; margin-top:5px; margin-left:3px">
                {{$message}}
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name='password' id='password' style="font-family: poppins; font-size: 12px" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-3">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember" style="font-family: poppins; font-size: 12px; color: gray">
                Remember me
              </label>
            </div>
          </div>
          <div class="col-6 mb-3" style="text-align: right">
            <a href="#" style="font-family: poppins; font-size: 12px; text-decoration: none">Forgot Password?</a>
          </div>
          <!-- /.col -->
          <div class="col-12 mb-3">
            <input type="submit" class="btn btn-primary btn-block" name='signin' id='signin' style="font-family: poppins; font-size: 12px"></input>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <div class="text-center" style="font-family: poppins; font-size: 12px">
        <p style="margin-bottom: 0px">Don't have an account? <a href="register" style="text-decoration: none">Register</a></p>
        </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

@include('layout.partials.script')