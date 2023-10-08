@extends('layout.layout')
@section('content')
<div class="layout-px-spacing">
   <div class="middle-content container-xxl p-0">
      <div class="row layout-top-spacing">
         <form action="invoices" method="POST">
            @csrf
            <div class="row m-2 text-center">
               <div class="col-12 text-center">

               
               <div class="row text-center">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                  <label for="reg_date">Month</label>
                  <input id="reg_date" name="date" type="date" class="form-control" placeholder="Registration Date">
               </div>
               </div>
               <div class="row">
               <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2">
                  <label for="student">Student</label>
                  <select name="student" id="student" class="vanilla_reports" >
                     <option value="" >Choose One..</option>
                     @foreach($students as $student)
                     <option value="{{$student->id}}">{{$student->student_name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2">
                  <label for="family">Family</label>
                  <select name="family" id="family" class="vanilla_reports2" >
                     <option value="" >Choose One..</option>
                     @foreach($families as $family)
                     <option value="{{$family->custom_id}}">{{$family->family_name}}</option>
                     @endforeach
                  </select>
               </div>

               </div>
               <div class="row">
               <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                  <label for="button"></label>
                  <input name="button" type="submit" class="form-control mt-3 p-2 btn btn-primary" >
               </div>

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
                              <th>Campus Name</th>
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
                              
                              <td>{{$datas->Campus?->campus_name}}</td>
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
                                 
                              <div class="action-btns">
                                 <form action="show_invoice" method="POST">
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$datas->id}}">
                                  
                                    <a href="javascript:{}" onclick="this.closest('form').submit();" class="m-2 action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="View">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </a>
                                 </form>
                                 <form action="edit_single_invoice" method="POST">
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{$datas->id}}">
                                  
                                    <a href="javascript:{}" onclick="this.closest('form').submit();" class="m-2 action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="View">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                      </a>
                                 </form>
                               
                               
                               <a onclick=" deleteItem({{$datas->id}}, 'invoices/')" href="javascript:void(0);" class="m-2 action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                  </a>
                                 
                                  </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr collspan>
                              <th class="text-center">ID</th>
                              <th>Student Name</th>
                              <th>Campus</th>
                              <th>Invoice Id</th>
                              <th>Fee Date</th>
                              <th>Head Amount</th>
                              <th>Mega Discount</th>
                              <td><strong>{{$total_paid}}</strong></td>
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