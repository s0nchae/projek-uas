@include('layout.partials.style')

<body class="hold-transition login-page" style="background-image: linear-gradient(#1E3A8A, #10214fff)">
<div class="login-box">
  <div class="login-logo">
    <a style="font-family: poppins; text-decoration: none; color: white" href="../../index2.html"><strong>Lorem</strong>Ipsum</a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="border-radius: 20px;">
    <div class="card-body login-card-body" style="border-radius: 20px; padding: 30px; box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.2)">
      <h4 class="header text-center" style="font-family: poppins; color: #FF475A"><strong>Create your account</strong></h4>
      <p class="login-box-msg" style="font-family: poppins; font-size: 12px; color: gray">First time here?</p>

      <form action="{{route('register')}}" method="post">
        @csrf
        <div class="form-group mb-3">
          <input type="text" class="form-control" name='name' id='name' style="font-family: poppins; font-size: 12px" placeholder="Full name">
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" name='username' id='username' style="font-family: poppins; font-size: 12px" placeholder="Username">
        </div>
        <div class="form-group mb-3">
          <input type="email" class="form-control" name='email' id='email' style="font-family: poppins; font-size: 12px" placeholder="Email">
        </div>
        <div class="form-group mb-3">
          <input type="password" class="form-control" name='password' id='password' style="font-family: poppins; font-size: 12px" placeholder="Password">
        </div>
        <div class="form-group mb-3">
          <input type="password" class="form-control" name='password_confirmation' id='password' style="font-family: poppins; font-size: 12px" placeholder="Confirm password">
        </div>
        <div class="row">
          <div class="col-1 mb-3">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
            </div>
          </div>
          <div class="col-11 mb-3">
            <div class="icheck-primary">
              <label for="remember" style="font-family: poppins; font-size: 12px; color: gray">
                By creating an account means you agree to the <strong>Terms and Conditions</strong>, and our <strong>Privacy Policy</strong>.
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 mb-3">
            <input type="submit" name='signup' id='signup' class="btn btn-primary btn-block" style="font-family: poppins; font-size: 12px" value='Register'></input>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <div class="text-center" style="font-family: poppins; font-size: 12px">
        <p style="margin-bottom: 0px">Already have an account? <a href="login" style="text-decoration: none">Sign in</a></p>
        </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

@include('layout.partials.script')