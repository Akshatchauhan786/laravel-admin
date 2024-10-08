@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('admin')
<div class="page-content">
<!-- <div class="welcome-message text-center">
      <h1 style="font-size: 5.5rem;">Welcome <br> to our <br>Admin Side <br>for Blog Post</h1>
   </div> -->
   <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
      <div class="col">
         <div class="card radius-10 bg-gradient-deepblue">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <h5 class="mb-0 text-white">{{ $blogCount }}</h5>
               </div>
               <div class="d-flex align-items-center text-white">
                  <p class="mb-0">Blog</p>
                  <!-- <p class="mb-0 ms-auto">+4.2%<span><i class="bx bx-up-arrow-alt"></i></span></p> -->
               </div>
            </div>
         </div>
      </div>
      <div class="col">
         <!-- <div class="card radius-10 bg-gradient-orange">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <h5 class="mb-0 text-white">$8323</h5>
                  <div class="ms-auto">
                     <i class="bx bx-dollar fs-3 text-white"></i>
                  </div>
               </div>
               <div class="progress my-3 bg-light-transparent" style="height:3px;">
                  <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
               <div class="d-flex align-items-center text-white">
                  <p class="mb-0">Total Revenue</p>
                  <p class="mb-0 ms-auto">+1.2%<span><i class="bx bx-up-arrow-alt"></i></span></p>
               </div>
            </div>
         </div> -->
      </div>
      <div class="col">
         <!-- <div class="card radius-10 bg-gradient-ohhappiness">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <h5 class="mb-0 text-white">6200</h5>
                  <div class="ms-auto">
                     <i class="bx bx-group fs-3 text-white"></i>
                  </div>
               </div>
               <div class="progress my-3 bg-light-transparent" style="height:3px;">
                  <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
               <div class="d-flex align-items-center text-white">
                  <p class="mb-0">Visitors</p>
                  <p class="mb-0 ms-auto">+5.2%<span><i class="bx bx-up-arrow-alt"></i></span></p>
               </div>
            </div>
         </div> -->
      </div>
      <div class="col">
         <!-- <div class="card radius-10 bg-gradient-ibiza">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <h5 class="mb-0 text-white">5630</h5>
                  <div class="ms-auto">
                     <i class="bx bx-envelope fs-3 text-white"></i>
                  </div>
               </div>
               <div class="progress my-3 bg-light-transparent" style="height:3px;">
                  <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
               <div class="d-flex align-items-center text-white">
                  <p class="mb-0">Messages</p>
                  <p class="mb-0 ms-auto">+2.2%<span><i class="bx bx-up-arrow-alt"></i></span></p>
               </div>
            </div>
         </div> -->
      </div>
   </div>
   <!-- end row
   <div class="card radius-10">
      <div class="card-body">
         <div class="d-flex align-items-center">
            <div>
               <h5 class="mb-0">BooKing Summary</h5>
            </div>
            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
            </div>
         </div>
         <hr>
         <div class="table-responsive">
            <table class="table align-middle mb-0">
               <thead class="table-light">
                  <tr>
                     <th>Booking Id</th>
                     <th>Name</th>
                     <th>Mobile</th>
                     <th>Booking Date</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>vinod</td>
                     <td>
                        ljdfjtrjhi
                     </td>
                     <td>Emy Jackson</td>
                     <td>28 Jul 2020</td>
                     <td>
                        <div class="badge rounded-pill bg-light-success text-success w-100">Active</div>
                     </td>
                     <td>
                        <a href="#" class="btn btn-danger"> <i class='fadeIn animated bx bx-trash'></i></a>
                        <a href="#" class="btn btn-primary"> <i class='fadeIn animated bx bx-show'></i></a>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div> -->
</div>
@endsection
