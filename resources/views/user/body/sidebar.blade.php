<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('adminbackend/assets/images/logo-img.png') }}" class="logo-icon" alt="logo icon">
				</div>
				
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

					<li>
					<a href="{{ route('user.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li class="">
					<a href="{{route('user.listservice')}}" aria-expanded="false">
						<div class="parent-icon"><i class="bx bx-book"></i>
						</div>
						<div class="menu-title">Service List</div>
					</a>
				</li>

			</ul>
			<!--end navigation-->
		</div>