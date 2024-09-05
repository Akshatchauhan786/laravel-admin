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
          <form method="POST" action="{{ route('admin.sendPasswordResetToken') }}">
         
         @csrf
              <h1>Reset Password</h1>
              @if(Session::get('fail'))
              <div class="alert alert-danger">
              {{ Session::get('fail') }}
             </div>
             @endif
              <div>
                <input type="text" class="form-control" placeholder="Email" name="email"/>
                @error('email')<span class="text-danger float left" role="alert">{{ $message }}</span>@enderror
              </div>

               <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        @if(Session::get('error'))<span class="text-danger">
         {{ Session::get('error') }}
        </span> 
         @endif
      @if(Session::get('message'))
         <span class="text-success">
              {{ Session::get('message') }}
        </span>
        @endif
    
        @error('email')
            <span class="text-danger" role="alert">
            {{ $message }}
          </span>
          @enderror


              <div>
               <button type="submit" class="btn btn-primary btn-block">Forgot Password</button>

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="{{ route('admin.login') }}" class="to_register"> Back To Login </a>
                </p>

                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>












