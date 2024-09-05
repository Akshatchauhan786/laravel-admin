<div class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img src="{{ asset('frontend/images/logo1.png') }}" class="logo-icon" alt="logo icon" style="width: 167px;height: 58px;">
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li>
      <a href="{{ route('admin.dashboard') }}">
        <div class="parent-icon">
          <i class='bx bx-home-circle'></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li>
      <a href="{{ route('admin.viewblog') }}">
        <div class="parent-icon">
        <i class="fa-brands fa-blogger"></i>
        </div>
        <div class="menu-title">Blogs</div>
      </a>
    </li>
  </ul>
  <!--end navigation-->
</div>