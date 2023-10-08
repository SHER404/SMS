@extends('layout.layout')
@section('content')
<?php
$p_color='green';
$a_color='red';
$l_color='gray';
$sunday_color='orangered';
$simple_color='skyblue';
$holiday_color='yellow';
$halfday_color='purple';
$st_set=App\Http\Controllers\EmployeesAttendenceSettingsController::getSttings();
if($st_set){
   $p_color=$st_set->e_p_color;
   $a_color=$st_set->e_a_color;
   $l_color=$st_set->e_l_color;
   $sunday_color=$st_set->e_sunday_color;
   $simple_color=$st_set->e_simple_color;
   $holiday_color=$st_set->e_holiday_color;
   $halfday_color=$st_set->e_h_color;
}

    ?>
<style>
#table-wrapper {
  position:relative;
}
#table-scroll {
  max-height:450px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width:100%;

}
#table-wrapper table * {
  background:white;
  color:black;
}
#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  z-index:2;
  height:20px;
  width:35%;
  border:1px solid red;
}
   .head-bg{
   background-color:white !important;
   border:2px solid black !important;
   border-radius:0.5rem !important;
   color: black !important;
   text-align: center !important;
   }
   .td-bg{
   background-color:white !important;
   border:2px solid skyblue !important;
   border-radius:0.5rem !important;
   color: black
    !important;
   text-align: center !important;
   }
   .absent-bg{
   background-color:<?=$a_color?> !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   color: white !important;
   text-align: center !important;
   }
   .leave-bg{
   background-color:<?=$l_color?> !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   color: white !important;
   text-align: center !important;
   }
   .present-bg{
   background-color:<?=$p_color?> !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   color: white !important;
   text-align: center !important;
   }
   .simple-bg{
   background-color:<?=$simple_color?> !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   color: black !important;
   text-align: center !important;
   }
   .holiday-bg{
   background-color:<?=$holiday_color?> !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   color: black !important;
   text-align: center !important;
   }
   .sunday-bg{
   background-color:<?=$sunday_color?> !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   color: black !important;
   text-align: center !important;
   }
   .halfday-bg{
   background-color:<?=$halfday_color?> !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   color: white !important;
   text-align: center !important;
   }
   .title-bg{
   background-color:black !important;
   color: white !important;
   border:2px solid white !important;
   border-radius:0.5rem !important;
   text-align: center !important;
   }
   .today-bg{
   background-color:skyblue !important;
   color: white !important;
   border:5px solid white !important;
  
   border-radius:0.5rem !important;
   text-align: center !important;
   }
</style>
<div class="layout-px-spacing">
   <div class="middle-content container-xxl p-0">
      <div class="row layout-top-spacing">
         <h3>Employee Attendence</h3>
         <?php
         $att_types=['P','A','L','H'];
         $att_types2=['P'=>'present','A'=>'absent','L'=>'leave','H'=>'halfday'];
         if(isset($attendence_start)){
            $start_year=date('Y-m-01',strtotime($attendence_start));
         }else{
            $start_year=date('Y-m-01');
         }
         ?>
         <form action="employee-attendence" method="POST">
            @csrf
            <div class="row m-2">
               <div class="col-12">
                  <div class="row">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                  <label for="employee">Employee</label>
                  <select name="employee" id="vanilla_employee_search" class="vanilla_employee_search" >
                     <option value="" >All</option>
                     @foreach($allemployees as $emp)
                     <option value="{{$emp->id}}" <?php if($emp->id==$emp_id){ echo "selected";}?>>{{$emp->employee_name}}</option>
                     @endforeach
                  </select>
               </div>
              
               <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                  <label for="month">Month</label>
                  <input type="month" name="month" value="<?=date('Y-m',strtotime($start_year))?>" class="form-control" id="month">
                  
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
                  <div id="table-wrapper">
                     <p class="text-center m-4">
                     <?php 
                                                foreach($att_types2 as $key=>$t){
                                                   ?>
                                                   <span class="<?=$t?>-bg m-1 p-2" style="display:inline;width: 10px;height: 10px;"><?=$key?></span>
                                                   <span> => <?=$t?></span>
                                                

                                                   <?php
                                                }
                                                ?>
                     </p>
                  <h2 class="text-center">
                                                
                     <span class="card shadow d-inline p-2"><?=date('M Y',strtotime($start_year));?></span></h2>
                      <div id="table-scroll">
                      
                     <table id="" class="table dt-table-hover ">
                        <thead>
                        <tr>
                              <th class=""></th>
                              <th class=""></th>
                             
                             

                              <?php 

                                 
                                 
                                  
                                  //$end_year=date('2023-02-01');
                                  $end_year=date('Y-m-d',strtotime("+1 month",strtotime($start_year)));
                              
                                 for($i=strtotime($start_year);$i<strtotime($end_year);$i=strtotime("+1 day", $i)){
                                 $day=date("d",$i);
                                 $dayy=date("D",$i);
                                 $month_name=date("M",$i);
                                 $att_date=date("Y-m-d",$i);
                                 if($day==date("d")){
                                    if($dayy!='Sun'){
                                    ?>
                                    <th class="">
                                             <select name="" onchange="default_attend(this.value,'<?=$att_date?>')" class="form-control present-bg" id="select_<?=$i?>_">
                                                <option value="">--</option>
                                                <?php 
                                                foreach($att_types as $t){
                                                   ?>
                                                   <option value="<?=$t?>" ><?=$t?></option>
                                                

                                                   <?php
                                                }
                                                ?>
                                             </select>
                                    </th>
                                    <?php
                                 }}else{

                                 
                                 ?>
                                   
                                   <th class="">
                                    
                                   
                                    
                                   </th>
                                 <?php
                                 }
                                 }
                                 ?>
                              <th class=""></th>
                              <th class=""></th>
                              <th class=""></th>
                           </tr>
                           <tr>
                              <th class="head-bg">#</th>
                              
                              <th class="head-bg">Employee</th>
                             

                              <?php 

                                 
                                 
                                  
                                  //$end_year=date('2023-02-01');
                                  $end_year=date('Y-m-d',strtotime("+1 month",strtotime($start_year)));
                              
                                 for($i=strtotime($start_year);$i<strtotime($end_year);$i=strtotime("+1 day", $i)){
                                 $day=date("d",$i);
                                 $month_name=date("M",$i);
                                 if($day==date("d")){
                                    ?>
                                    <th class="today-bg shadow"><?=$month_name.' '.$day;?></th>
                                    <?php
                                 }else{

                                 
                                 ?>
                                   
                                   <th class="title-bg"><?=$month_name.' '.$day;?></th>
                                 <?php
                                 }
                                 }
                                 ?>
                              <th class="title-bg">Total P</th>
                              <th class="title-bg">Total A</th>
                              <th class="title-bg">Total L</th>
                              <th class="title-bg">Total H</th>
                           </tr>
                           
                        </thead>
                        <tbody>
                           @foreach($employees as $datas)
                           <?php
                              
                              $total_p=0;
                              $total_a=0;
                              $total_l=0;
                              $total_h=0;
                              ?> 
                           <tr>
                              <td class="td-bg">{{$loop->iteration}}</td>
                             
                              <td class="td-bg">{{$datas->employee_name}}
                                                 <a href="/students/<?=$datas->id?>" class="w-icon btn btn-light"> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                                </a>
                              </td>
                             
                              <?php 
                                
                                 
                                 
                              
                                 for($i=strtotime($start_year);$i<strtotime($end_year);$i=strtotime("+1 day", $i)){
                                    
                                 $day=date("d",$i);
                                 $dayy=date("D",$i);
                                 $month_name=date("M",$i);
                                 $att_date=date("Y-m-d",$i);
                                 $st_holi=App\Http\Controllers\EmployeesAttendenceHolidaysController::isHoliday($att_date);
                                 $attendence=App\Http\Controllers\EmployeesAttendenceController::getEmployeesAttendence($att_date,$datas->id);
                                 
                                 if($dayy=='Sun'){
                                 ?>
                              <th class="sunday-bg"><?=$dayy?></th>
                               <?php
                                 }else if($st_holi){
                                    ?>
                                 <th class="holiday-bg">OFF</th>
                                  <?php
                                    }else{
                                    if($attendence){
                                       if($attendence->attendence_value=='P'){
                                          $total_p++;
                                          ?>
                                          <th class="present-bg" id="item_<?=$i?>_<?=$datas->id?>">
                                             <select name="" onchange="updateAttendence(this.value,'<?=$att_date?>',<?=$datas->id?>,<?=$i?>)" class="form-control present-bg" id="select_<?=$i?>_<?=$datas->id?>">
                                                <option value="">--</option>
                                                <?php 
                                                foreach($att_types as $t){
                                                   ?>
                                                   <option value="<?=$t?>" <?php if($attendence->attendence_value==$t){ echo "selected";}?>><?=$t?></option>
                                                

                                                   <?php
                                                }
                                                ?>
                                             </select>
                                          </th>
                                          <?php

                                       }else if($attendence->attendence_value=='A'){
                                          $total_a++;
                                          ?>
                                          <th class="absent-bg" id="item_<?=$i?>_<?=$datas->id?>">
                                              <select name="" onchange="updateAttendence(this.value,'<?=$att_date?>',<?=$datas->id?>,<?=$i?>)" class="form-control absent-bg" id="select_<?=$i?>_<?=$datas->id?>">
                                                <option value="">--</option>
                                                <?php 
                                                foreach($att_types as $t){
                                                   ?>
                                                   <option value="<?=$t?>" <?php if($attendence->attendence_value==$t){ echo "selected";}?>><?=$t?></option>
                                                

                                                   <?php
                                                }
                                                ?>
                                             </select>
                                       </th>
                                          <?php

                                       }else if($attendence->attendence_value=='L'){
                                          $total_l++;
                                          ?>
                                          <th class="leave-bg" id="item_<?=$i?>_<?=$datas->id?>">
                                              <select name="" onchange="updateAttendence(this.value,'<?=$att_date?>',<?=$datas->id?>,<?=$i?>)" class="form-control leave-bg" id="select_<?=$i?>_<?=$datas->id?>">
                                                <option value="">--</option>
                                                <?php 
                                                foreach($att_types as $t){
                                                   ?>
                                                   <option value="<?=$t?>" <?php if($attendence->attendence_value==$t){ echo "selected";}?>><?=$t?></option>
                                                

                                                   <?php
                                                }
                                                ?>
                                             </select>   
                                             
                                          </th>
                                          <?php

                                       }elseif($attendence->attendence_value=='H'){
                                          $total_h++;
                                          ?>
                                          <th class="halfday-bg" id="item_<?=$i?>_<?=$datas->id?>">
                                              <select name="" onchange="updateAttendence(this.value,'<?=$att_date?>',<?=$datas->id?>,<?=$i?>)" class="form-control halfday-bg" id="select_<?=$i?>_<?=$datas->id?>">
                                                <option value="">--</option>
                                                <?php 
                                                foreach($att_types as $t){
                                                   ?>
                                                   <option value="<?=$t?>" <?php if($attendence->attendence_value==$t){ echo "selected";}?>><?=$t?></option>
                                                

                                                   <?php
                                                }
                                                ?>
                                             </select>   
                                             
                                          </th>
                                          <?php

                                       }else{
                                          ?>
                                          <th class="simple-bg" id="item_<?=$i?>_<?=$datas->id?>">
                                             <select name="" onchange="updateAttendence(this.value,'<?=$att_date?>',<?=$datas->id?>,<?=$i?>)" class="form-control simple-bg" id="select_<?=$i?>_<?=$datas->id?>">
                                                <option value="">--</option>
                                                <?php 
                                                foreach($att_types as $t){
                                                   ?>
                                                   <option value="<?=$t?>" ><?=$t?></option>
                                                

                                                   <?php
                                                }
                                                ?>
                                             </select>
                                            
                                             
                                          </th>
                                          <?php

                                       }
                                    }else{
                                       ?>
                                       <th class="simple-bg" id="item_<?=$i?>_<?=$datas->id?>">
                                            <select name="" onchange="updateAttendence(this.value,'<?=$att_date?>',<?=$datas->id?>,<?=$i?>)" class="form-control simple-bg" id="select_<?=$i?>_<?=$datas->id?>">
                                                <option value="">--</option>
                                                <?php 
                                                foreach($att_types as $t){
                                                   ?>
                                                   <option value="<?=$t?>"><?=$t?></option>
                                                

                                                   <?php
                                                }
                                                ?>
                                                
                                             </select>
                                       </th>
                                       <?php

                                    }
                                   
                                 }
                              }

                                 ?>
                             
                              <td class="present-bg" id="total_p_<?=$datas->id?>">{{$total_p}}</td>
                              <td class="absent-bg" id="total_a_<?=$datas->id?>">{{$total_a}}</td>
                              <td class="leave-bg" id="total_l_<?=$datas->id?>">{{$total_l}}</td>
                              <td class="halfday-bg" id="total_h_<?=$datas->id?>">{{$total_h}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection