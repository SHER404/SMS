@extends('layout.layout')
@section('content')
<style>
   .unpaid-fee-bg{
   background-color:#FDDB27FF !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   color: black !important;
   }
   .paid-fee-bg{
   background-color:#9CC3D5FF !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   color: black !important;
   }
   .fee-head-bg{
   background-color:black !important;
   color: white !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   }
</style>
<div class="layout-px-spacing">
   <div class="middle-content container-xxl p-0">
      <div class="row layout-top-spacing">
         <h3>Parent Invoices</h3>
         <div class="row layout-spacing">
            <div class="col-lg-12">
               <div class="statbox widget box box-shadow">
                  <div class="widget-content widget-content-area">
                     <table id="individual-col-search" class="table dt-table-hover">
                        <thead>
                           <tr>
                              <th class="fee-head-bg">#</th>
                              <th class="fee-head-bg">Father Name</th>
                              <?php 
                               $campus=App\Http\Controllers\Controller::globalSettingsBlade();
                                 
                               $start_year=$campus->session?->starting_year;
                               $end_year=$campus->session?->ending_year;
                              
                              
                              for($i=strtotime($start_year);$i<=strtotime($end_year);$i=strtotime("+1 month", $i)){
                                 $month_name=date("M",$i);
                                 $year_number=date("Y",$i);
                                 ?>
                              <th class="fee-head-bg"><?=$month_name.'.'.$year_number;?></th>
                              <?php
                                 }
                                 ?>
                              <th class="fee-head-bg">Total</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($Parents as $datas)
                           <?php
                              $paid=0;
                              $total=0;
                              ?> 
                           <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$datas->father_name}}</td>
                              <?php for($i=strtotime($start_year);$i<=strtotime($end_year);$i=strtotime("+1 month", $i)){
                                 $month=date("m",$i);
                                 $year=date("Y",$i);
                                 $fee_date=date("Y-m-d",$i);
                                 $feeamount=0;
                                 if($datas->student){
                                    foreach($datas->student as $st){
                                       $fees=App\Http\Controllers\PaidFeesController::paidFee($month,$year,$st->id);
                                       foreach($fees as $fee){
                                    
                                          $feeamount+=$fee->pay_amount;
                                      
                                      
                                      }
                                 
                                    }
                                  
                                 
                                 }
                                 
                                 ?>
                              <td   class="<?php if($feeamount>0){ echo 'paid-fee-bg';}else{echo 'unpaid-fee-bg';}?>">
                                 <?php if($feeamount>0){
                                    ?>
                                 <form action="parentInvoice" method="POST">
                                    @csrf
                                    <input type="hidden" name="parent_id" value="{{$datas->id}}" id="">
                                    <input type="hidden" name="month" value="{{$month}}" id="">
                                    <input type="hidden" name="year" value="{{$year}}" id="">
                                    <a href="javascript:{}" onclick="this.closest('form').submit();" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="View">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                          <circle cx="12" cy="12" r="3"></circle>
                                       </svg>
                                    </a>
                                 </form>
                                 <!-- <form action="add_parent_invoice" method="POST">
                                    @csrf
                                    <input type="hidden" name="parent_id" value="{{$datas->id}}" id="">
                                    <input type="hidden" name="month" value="{{$month}}" id="">
                                    <input type="hidden" name="year" value="{{$year}}" id="">
                                    <a href="javascript:{}" onclick="this.closest('form').submit();" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </form> -->
                                 <?php
                                    echo $feeamount;
                                      $total+=$feeamount; 
                                      
                                      }else{
                                         
                                         ?>
                                 <form action="parentInvoice" method="POST">
                                    @csrf
                                    <input type="hidden" name="parent_id" value="{{$datas->id}}" id="">
                                    <input type="hidden" name="month" value="{{$month}}" id="">
                                    <input type="hidden" name="year" value="{{$year}}" id="">
                                    <a href="javascript:{}" onclick="this.closest('form').submit();" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="View">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                          <circle cx="12" cy="12" r="3"></circle>
                                       </svg>
                                    </a>
                                 </form>
                                 <!-- <form action="add_parent_invoice" method="POST">
                                    @csrf
                                    <input type="hidden" name="parent_id" value="{{$datas->id}}" id="">
                                    <input type="hidden" name="month" value="{{$month}}" id="">
                                    <input type="hidden" name="year" value="{{$year}}" id="">
                                    <a href="javascript:{}" onclick="this.closest('form').submit();" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                          <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                       </svg>
                                    </a>
                                 </form> -->
                                 <?php
                                    }?>
                              </td>
                              <?php
                                 }
                                 ?>
                              <td class="unpaid-fee-bg">{{$total}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                                            <tr>
                                                
                                               
                                                <th class="invisible"></th>
                                                <th class="invisible"></th>
                                               
                                                <?php for($i=strtotime($start_year);$i<=strtotime($end_year);$i=strtotime("+1 month", $i)){
                                                   
                                                ?>
                                                <th class="invisible"></th>

                                                <?php
                                                 }?>


                                                <th class="invisible"></th>
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