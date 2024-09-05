@extends('user.layouts.master')

@section('title', 'Profile Edit')

@section('user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3"> User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profile</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
				 
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
	@if($USERS_LOGIN['image'] !='')											
 	<img src="{{asset('profile')}}/{{$USERS_LOGIN['image']}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
	 @else
     <img src="{{ asset('profile')}}/no_image.jpg" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
	 @endif
					<div class="mt-3">
						<h4>{{$USERS_LOGIN['name']}}</h4>
						<p class="text-secondary mb-1">{{$USERS_LOGIN['email']}}</p>
						
					 
					</div>
										</div>
										<hr class="my-4" />
										<ul class="list-group list-group-flush">
											
										</ul>
									</div>
								</div>
							</div>
<div class="col-lg-8">
	<div class="card">
		<div class="card-body">

		<form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" >
			@csrf
		
			
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Full Name</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="name" class="form-control" value="{{$USERS_LOGIN['name']}}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Email</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="email" name="email" class="form-control" value="{{$USERS_LOGIN['email']}}" />
				</div>
			</div>






			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Photo</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="file" name="image" class="form-control"  id="image"   />
				</div>
			</div>



			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0"> </h6>
				</div>
				<div class="col-sm-9 text-secondary">
				@if($USERS_LOGIN['image'] !='')
					 <img id="showImage" src="{{asset('profile')}}/{{$USERS_LOGIN['image']}}" alt="Admin" style="width:100px; height: 100px;"  >
				@else
				<img id="showImage" src="{{ asset('profile')}}/no_image.jpg" alt="Admin" style="width:100px; height: 100px;"  >
				@endif
				</div>
			</div>





			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
				</div>
			</div>
		</div>

		</form>



	</div>
	 



							</div>
						</div>
					</div>
				</div>
			</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});


</script>


 
@endsection