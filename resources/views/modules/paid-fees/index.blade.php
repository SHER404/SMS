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
   .headcol {
  position: absolute;
  width: 5em;
  left: 0;
  top: auto;
  border-top-width: 1px;
  /*only relevant for first row*/
  margin-top: -1px;
  /*compensate for top border*/
}

.headcol:before {
  content: 'Row ';
}
</style>
<div class="layout-px-spacing">
   <div class="middle-content container-xxl p-0">
      <div class="row layout-top-spacing">
         <h3>Student Fees</h3>
         <form action="paid-fees" method="POST">
            @csrf
            <div class="row m-2">
               <div class="col-12">
                  <div class="row">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                  <label for="student">Student</label>
                  <select name="student" id="student_search" class="vanilla_student_search" >
                     <option value="" >Choose One..</option>
                     @foreach($allstudents as $studentt)
                     <option value="{{$studentt->id}}">{{$studentt->student_name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                  <label for="student">Class</label>
                  <select name="class" id="class_search" class="vanilla_class_search" >
                     <option value="" >Choose One..</option>
                     @foreach($allclasses as $class)
                     <option value="{{$class->id}}">{{$class->class_name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-2">
                  <label for="family">Family</label>
                  <select name="family" id="family" class="vanilla_fam" >
                     <option value="" >Choose One..</option>
                     @foreach($families as $family)
                     <option value="{{$family->custom_id}}">{{$family->family_name}}</option>
                     @endforeach
                  </select>
               </div>

                  </div>
                  <div class="row">
                  <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                  <label for="button"></label>
                  <input name="button" type="submit" class="form-control mt-3 p-2 btn btn-primary" >
                   </div>

                  </div>
               </div>
              
               
               
            </div>
         </form>
         
         
         <div class="row layout-spacing">
            <div class="col-lg-12">
               <div class="statbox widget box box-shadow">
                  <div class="widget-content widget-content-area">
                     <table id="individual-col-search" class="table dt-table-hover">
                        <thead>
                           <tr>
                              <th class="fee-head-bg">#</th>
                              <th class="fee-head-bg">R.No</th>
                              <th class="fee-head-bg headcol">Students</th>
                              <th class="fee-head-bg">Class</th>

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
                           @foreach($student as $datas)
                           <?php
                              $paid=0;
                              $total=0;
                              ?> 
                           <tr>
                              <td style="position:stikcy;">{{$loop->iteration}}</td>
                              <td>{{$datas->Registration_id}}</td>
                              <td>{{$datas->student_name}}</td>
                              <td>{{$datas->class?->class_name}}</td>
                              <?php for($i=strtotime($start_year);$i<=strtotime($end_year);$i=strtotime("+1 month", $i)){
                                 $month=date("m",$i);
                                 $year=date("Y",$i);
                                 $fee_date=date("Y-m-d",$i);
                                 $feeCheck=App\Http\Controllers\InvoicesController::paidFeeCheck($month,$year,$datas->id);
                                 $fees=App\Http\Controllers\PaidFeesController::paidFee($month,$year,$datas->id);
                                 ?>
                              <?php
                                 $feeamount=0;
                                 // foreach($fees as $fee){
                                    
                                 //     $feeamount+=$fee->pay_amount;
                                 
                                 
                                 // }
                                 
                                   ?>
                              <td   class="<?php if($feeCheck){ echo 'paid-fee-bg';}else{echo 'unpaid-fee-bg';}?>">
                                 <?php if($feeCheck){
                                    ?>
                                    
                                  
                                 <a href="/invoices/show?id={{$datas->id}}&feeyear={{$year}}&feemonth={{$month}}" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="View">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                       <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                       <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                 </a>
                                 <?php
                                    $fee_paid=0;
                                       if($feeCheck){
                                          if($feeCheck->invoice_heads){
                                          foreach($feeCheck->invoice_heads as $fee){
                                    
                                            $fee_paid+=$fee->paid_amount;
                                       
                                       
                                       
                                       }
                                      }
                                     }
                                       echo $fee_paid;
                                    
                                         $total+=$fee_paid; 
                                    }else{
                                       ?>
                                 <a href="/invoices/create?id={{$datas->id}}&feedate={{$fee_date}}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                       <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                 </a>
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