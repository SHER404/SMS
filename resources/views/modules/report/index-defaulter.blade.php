@extends('layout.layout')
@section('content')
<div class="layout-px-spacing">
   <div class="middle-content container-xxl p-0">
      <div class="row layout-top-spacing">
         <form action="reports-defaulters" method="POST">
            @csrf
            <?php $fee_date=date('Y-m',strtotime($month))?>
            <div class="container">
            <div class="row">
               <div class="col-6 col-md-4 col-sm-6 col-lg-4 col-xl-4 mb-2">
                  <label for="month">Month</label>
                   <input type="month" value="<?=$fee_date?>" name="month" class="form-control">
               </div>
               
               
               
               
               <div class="col-6 col-md-4 col-sm-6 col-lg-4 col-xl-4 mb-2 ">
                  <label for="button"></label>
                  <input name="button" type="submit" class="form-control mt-3 p-2 btn btn-primary" >
               </div>
            </div>
            </div>
          
         </form>
         <div class="row layout-spacing">
            <div class="col-lg-12">
               @if(session()->has('success'))
               <div class="alert alert-success">
                  {{ session()->get('success') }}
               </div>
               <br>
               @endif
               <div class="statbox widget box box-shadow">
                  <div class="widget-content widget-content-area">
                     <table id="individual-col-search" class="table dt-table-hover">
                        <thead>
                           <tr>
                              <th class="text-center">ID</th>
                              <th>Student Name</th>
                              <th>Class Name</th>
                              
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $total_paid=0;?>
                           @if($data)
                           @foreach($data as $datas)
                           <tr id="item_{{$datas->id}}">
                              <td class="text-center">{{$loop->iteration}}</td>
                              <td><a href="{{route('students.edit',$datas->id)}}">{{$datas->student_name}}</a></td>
                             
                              <td>{{$datas->class?->class_name}}</td>
                              
                              <td>
                              <a href="/invoices/create?id={{$datas->id}}&feedate={{$fee_date}}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                       <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                 </a>
                              
                              
                              
                              </td>
                           </tr>
                           @endforeach
                           @endif
                        </tbody>
                        <tfoot>
                           <tr>
                              <th class="text-center">ID</th>
                              <th>Student Name</th>
                              <th>Class Name</th>
                              
                              <th>Action</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection