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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"> 
    <script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  </head>
<body class="login">


     <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
     

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="{{asset('admin/images/PNG-transparent.png')}}" width="300px" height="100px" alt="">
           <form method="post" action="{{url('admin/forgot-password')}}/{{$email}}/{{$token}}">
    @if(Session::get('error'))
              <div class="alert alert-danger">
              {{ Session::get('error') }}
             </div>
         @endif
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="New Password" name="password">
          <!-- <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"></span>
            </div>
          </div> -->
        </div>
        @error('password')
        <span class="text-danger" role="alert">
        {{ $message }}
        </span>
        @enderror
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confrim Password" name="password_confirmation">
          <!-- <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"></span>
            </div>
          </div> -->
        </div>
        @error('password_confirmation')
        <span class="text-danger" role="alert">
        {{ $message }}
        </span>
        @enderror
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form> 
          </section>
        </div>


       
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</body>
</html>
