<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('adminbackend/assets/images/logo-img.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('adminbackend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminbackend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('adminbackend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('adminbackend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminbackend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/assets/css/icons.css') }}" rel="stylesheet">
    <title>User Password Forget </title>
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box">
				<div class="card-body">
        <form class="row g-3" method="POST" action="{{ route('user.sendPasswordResetToken') }}">
					<div class="p-4 rounded  border">
					
            @csrf
						<div class="text-center">
							<img src="{{ asset('adminbackend/assets/images/logo-img.png') }}" width="120" alt="" />
						</div>

						<h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
						<p class="text-muted">Enter your registered email ID to reset the password</p>
						@error('email')<span class="text-danger">{{ $message }}</span>@enderror
              @if(Session::get('message'))
              <div class="alert alert-success" role="alert">
              {{ Session::get('message') }}
             </div>
            @endif
            @if(Session::get('error'))
            <div class="alert alert-danger" role="alert">
              {{ Session::get('error') }}
             </div>
             @endif
            <div class="my-4">
							<label class="form-label">Email id</label>
							<input type="text" class="form-control form-control-lg" name="email" placeholder="example@user.com" />
             
						</div>
            
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary btn-lg">Send</button> <a href="{{url('/user/login')}}" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
						</div>
            
					</div>
          </form>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>