@extends('user.layouts.master')
@section('title', 'List Service')
@section('user')
<div class="page-content">
   <div class="card radius-10">
      <div class="card-body">
         <div class="d-flex align-items-center">
            <div>
               <h5 class="mb-0">Register Summary</h5>
            </div>
            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
            </div>
         </div>
         <hr>
         <div class="table-responsive">
            <table class="table align-middle mb-0">
               <thead class="table-light">
                  <tr>
                     <th>Service Name</th>
                     <th>Date</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @if(count($data) > 0)
                  @foreach($data as $datas)
                  <tr>
                     <td>
                        <div class="d-flex align-items-center">
                           <div class="ms-2">
                              <h6 class="mb-1 font-14">{{$datas->service}}</h6>
                           </div>
                        </div>
                     </td>
                     <td>{{ date('d/m/Y', strtotime($datas->updated_at)) }}</td>
                     <td>
                     @if($datas->status == 0)
                     <div class="badge rounded-pill bg-light-info text-info w-100">In Progress</div>
                    @else
                    <div class="badge rounded-pill bg-light-success text-success w-100">Completed</div>
                    @endif    
                     </td>
                     <td>
                        <a href="{{url('user/edit-service')}}/{{$datas->id}}" class="btn btn-primary" title="Product Details Data"><i class="fadeIn animated bx bx-pencil"></i> </a>
                     </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <td class="text-center"></td>
                     <td class="text-center">No Data</td>
                     <td class="text-center"></td>
                  </tr>
                  @endif
               </tbody>
            </table>
         </div>
         {{ $data->links() }}
      </div>
   </div>
</div>

@endsection