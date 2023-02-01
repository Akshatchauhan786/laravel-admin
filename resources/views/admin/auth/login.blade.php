<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Login </title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('admin/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
     

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <form method="POST" action="{{ route('admin.login') }}">
         
         @csrf
              <h1>Admin Login</h1>
              @if(Session::get('fail'))
              <div class="alert alert-danger">
              {{ Session::get('fail') }}
             </div>
             @endif
              <div>
                <input type="text" class="form-control" placeholder="Email" name="email"/>
                @error('email')<span class="text-danger float left" role="alert">{{ $message }}</span>@enderror
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password"/>
                @error('password')<span class="text-danger float left" role="alert">{{ $message }}</span>@enderror
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> Media Search Group</h1>
                  <p>©2023 All Rights Reserved. Media Search Group  Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
