@extends('layout.layout')
@section('content')
<div class="layout-px-spacing">
   <div class="middle-content container-xxl p-0">
      <div class="row layout-top-spacing">
         <form action="reports" method="POST">
            @csrf
            
            <div class="container">
            <div class="row">
               <div class="col-6 col-md-4 col-sm-6 col-lg-4 col-xl-4 mb-2">
                  <label for="student">Student</label>
                  <select name="student" id="student" class="vanilla_reports" >
                     <option value="" >Choose One..</option>
                     @foreach($students as $student)
                     <option value="{{$student->id}}">{{$student->student_name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-6 col-md-4 col-sm-6 col-lg-4 col-xl-4 mb-2">
                  <label for="family">Family</label>
                  <select name="family" id="family" class="vanilla_reports2" >
                     <option value="" >Choose One..</option>
                     @foreach($families as $family)
                     <option value="{{$family->custom_id}}">{{$family->family_name}}</option>
                     @endforeach
                  </select>
               </div>
               
               <div class="col-6 col-md-4 col-sm-6 col-lg-4 col-xl-4 mb-2">
                  <label for="head">Head</label>
                  <select name="head" id="head" class="vanilla_reports3" >
                     <option value="" >Choose One..</option>
                     @foreach($Head as $head_wise)
                     <option value="{{$head_wise->id}}">{{$head_wise->fee_head}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-6 col-md-4 col-sm-6 col-lg-4 col-xl-4 mb-2">
                  <label for="reg_date">Month</label>
                  <input id="reg_date" name="date" id="reg_date" type="date" class="form-control" placeholder="Registration Date">
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
                              <th>Student Family</th>
                              <th>Campus Name</th>
                              <th>Session</th>
                              <th>Invoice Id</th>
                              <th>Fee Date</th>
                              <th>Head Amount</th>
                              <th>Mega Discount</th>
                              <th>Total Paid</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $total_paid=0;?>
                           @foreach($data as $datas)
                           <tr id="item_{{$datas->id}}">
                              <td class="text-center">{{$loop->iteration}}</td>
                              <td>{{$datas->student?->student_name}}</td>
                              <td>{{$datas->student?->family?->family_name}}</td>
                              <td>{{$datas->Campus?->campus_name}}</td>
                              <td>{{$datas->academicSession?->starting_year}}--{{$datas->academicSession?->ending_year}}</td>
                              <td>{{$datas->invoice_id}}</td>
                              <td>{{$datas->fee_date}}</td>
                              <td>
                                 <?php
                                    $single_head=0;
                                    foreach($datas->Invoice_heads as $ih){
                                       $single_head+=$ih->head_amount;
                                    }
                                    echo $single_head ;
                                    ?>
                              </td>
                              <td>
                                 <?php
                                    $single_head=0;
                                    foreach($datas->Invoice_heads as $ih){
                                       $single_head+=$ih->mega_discount;
                                    }
                                    echo $single_head
                                                                  ?>
                              </td>
                              <td>
                                 <?php
                                    $single_paid=0;
                                    foreach($datas->Invoice_heads as $ih){
                                      $single_paid+=$ih->paid_amount;
                                    }
                                    
                                    $total_paid+=$single_paid;
                                    echo $single_paid ;
                                    ?>
                              </td>
                              <td>
                                 <form action="show_invoice" method="POST">
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$datas->id}}">
                                    <input type="submit" class="btn btn-primary" value="View"> 
                                 
                                 </form>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th class="text-center">ID</th>
                              <th>Student Name</th>
                              <th>Student Family</th>
                              <th>Campus</th>
                              <th>Session</th>
                              <th>Invoice</th>
                              <th>Fee Date</th>
                              <th>Head Amount</th>
                              <th>Mega Discount</th>
                              <td><strong>{{$total_paid}}</strong></td>
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