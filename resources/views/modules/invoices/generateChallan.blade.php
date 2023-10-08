@extends('layout.layout')
@section('content')


<div class="layout-px-spacing">
   <div class="middle-content container-xxl p-0">
      <div class="row layout-top-spacing">
         <form action="generate-challan" method="GET">
          
            <div class="row m-2 text-center">
               <div class="col-12 text-center">

               
               <div class="row text-center">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                  <label for="reg_date">Month</label>
                  <input id="reg_date" name="date" type="date" required class="form-control" placeholder="Registration Date">
               </div>
               </div>
               <div class="row">
               <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2">
                  <label for="class">Class</label>
                  <select name="class" id="class" class="vanilla_class_search" >
                     <option value="" >Choose One..</option>
                     @foreach($classes as $class)
                     <option value="{{$class->id}}" <?php if($class_id==$class->id){ echo 'selected';}?>>{{$class->class_name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2">
                  <label for="family">Family</label>
                  <select name="family" id="family" class="vanilla_reports2" >
                     <option value="" >Choose One..</option>
                     @foreach($families as $family)
                     <option value="{{$family->custom_id}}" <?php if($family_id==$family->custom_id){ echo 'selected';}?>>{{$family->family_name}}</option>
                     @endforeach
                  </select>
               </div>

               </div>
               <div class="row">
               <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                  <label for="button"></label>
                  <input name="button" type="submit" value="Populate" class="form-control mt-3 p-2 btn btn-primary" >
               </div>

               </div>
               
               
               </div>
            </div>
         </form>
         @if($data->count()>0)
         <form action="exportPdf" method="POST">
            @csrf
            <div class="row m-2 text-center">
               <div class="col-12 text-center">
                     <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                           <label for="button"></label>
                           @foreach($data as $datas)
                           <input type="hidden" name="ids[]" value="{{$datas->id}}" id="">
                           @endforeach
                           <input name="button" value="Generate" type="submit" class="form-control mt-3 p-2 btn btn-success" >
                        </div>
                     </div>
               </div>
            </div>
         </form>
         @endif
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
                              <th>Family Name</th>
                              <th>Class Name</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $total_paid=0;?>
                           @foreach($data as $datas)
                           <tr id="item_{{$datas->id}}">
                              <td class="text-center">{{$loop->iteration}}</td>
                              <td>{{$datas->student_name}}</td>
                              <td>{{$datas->family?->family_name}}</td>
                              <td>{{$datas->class?->class_name}}</td>
                              <td>
                              </td>
                                 
                              
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr collspan>
                              <th class="text-center">ID</th>
                              <th>Student Name</th>
                              <th>Student Family</th>
                              <th>Class name</th>
                              
                              <th colspan="1" class="invisible"></th>
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