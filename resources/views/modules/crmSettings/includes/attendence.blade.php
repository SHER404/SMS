

<div class="row shadow  m-1 p-3 text-center">
<?php
        $st_set=App\Http\Controllers\StudentAttendenceSettingsController::getSttings();
  if($st_set){

    ?>
    <form action="{{route('student-attendence-settings.update',$st_set->id)}}" method="POST">
    @csrf 
    @method('PUT')
     <div class="row">
     <div class="col-6">
        <div class="form-group mb-4">
        <h3>Student</h3>
        
        </div>

    </div>
     </div>                                       
    <div class="row">
    
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Present Color</label>
        <input type="color"  value="<?=$st_set->p_color?>" name="p_color" id="present_color" style="min-height:100
        ">
        </div>

    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Absent Color</label>
        <input type="color"  value="<?=$st_set->a_color?>" name="a_color" id="present_color" style="min-height:100
        ">
        </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Leave Color</label>
        <input type="color"  value="<?=$st_set->l_color?>" name="l_color" id="present_color" style="min-height:100
        ">
        </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Half Day Color</label>
        <input type="color"  value="<?=$st_set->h_color?>" name="h_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Sunday Color</label>
        <input type="color"  value="<?=$st_set->sunday_color?>" name="sunday_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Holiday Color</label>
        <input type="color"  value="<?=$st_set->holiday_color?>" name="holiday_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Simple Color</label>
        <input type="color"  value="<?=$st_set->simple_color?>" name="simple_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    </div>
    
    
    
    
    <input type="submit" value="Save" class="btn btn-primary">
</form>

    <?php
  }else{
    ?>
        <form action="{{ route('student-attendence-settings.store') }}" method="POST">
    @csrf 
     <div class="row">
     <div class="col-6">
        <div class="form-group mb-4">
        <h3>Student</h3>
        
        </div>

    </div>
     </div>                                       
    <div class="row">
    
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Present Color</label>
        <input type="color"   name="p_color" id="present_color" style="min-height:100
        ">
        </div>

    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Absent Color</label>
        <input type="color"   name="a_color" id="present_color" style="min-height:100
        ">
        </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Leave Color</label>
        <input type="color"   name="l_color" id="present_color" style="min-height:100
        ">
        </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Half Day Color</label>
        <input type="color"   name="h_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Sunday Color</label>
        <input type="color"   name="sunday_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Holiday Color</label>
        <input type="color"   name="holiday_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Simple Color</label>
        <input type="color"   name="simple_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    </div>
    
    
    
    
    <input type="submit" value="Create" class="btn btn-primary m-2"><br>
</form>

    <?php
  }                               
?>

<br>
<br>
<hr>
<form action="{{ route('student-holidays.store') }}" method="POST">
@csrf 
    <div class="row">
    <div class="col-12">
        <div class="form-group">
        <label for="name">Holidays</label>
       
        </div>

    </div>
    <div class="col-8">
        <div class="form-group">
        <input type="date" value="" required name="date" class="form-control">
        </div>

    </div>
    <div class="col-4">
        <div class="form-group">
        <input type="submit" value="Add" class="form-control btn btn-success"><br>
        </div>

    </div>
    </div>

</form>
<hr>
<div class="row">
     <?php
      $st_holi=App\Http\Controllers\StudentsAttendenceHolidaysController::getHolidays();
       if($st_holi){
        foreach($st_holi as $h){
      ?>
        <p id="item_{{$h->id}}" class="col-5 border shadow m-2 p-1 rounded"><?=date('d M Y',strtotime($h->date))?> 
        <button style="background:none; padding:0px"  onclick="deleteItem(<?=$h->id?>, 'student-holidays/')" type="submit" class="btn btn-link"><a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </a></button></p>

      <?php
      }
      }
     ?>

</div>
     

</div>






<!-- employees settings -->


<div class="row shadow m-2 p-3 text-center">
<?php
        $em_set=App\Http\Controllers\EmployeesAttendenceSettingsController::getSttings();
  if($em_set){

    ?>
    <form action="{{route('employee-attendence-settings.update',$em_set->id)}}" method="POST">
    @csrf 
    @method('PUT')
     <div class="row">
     <div class="col-6">
        <div class="form-group mb-4">
        <h3>Employees</h3>
        
        </div>

    </div>
     </div>                                       
    <div class="row">
    
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Present Color</label>
        <input type="color" value="<?=$em_set->e_p_color?>"   name="e_p_color" id="present_color" style="min-height:100
        ">
        </div>

    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Absent Color</label>
        <input type="color" value="<?=$em_set->e_a_color?>"  name="e_a_color" id="present_color" style="min-height:100
        ">
        </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Leave Color</label>
        <input type="color" value="<?=$em_set->e_l_color?>"  name="e_l_color" id="present_color" style="min-height:100
        ">
        </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Half Day Color</label>
        <input type="color" value="<?=$em_set->e_h_color?>"  name="e_h_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Sunday Color</label>
        <input type="color"  value="<?=$em_set->e_sunday_color?>" name="e_sunday_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Holiday Color</label>
        <input type="color" value="<?=$em_set->e_holiday_color?>"  name="e_holiday_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Simple Color</label>
        <input type="color" value="<?=$em_set->e_simple_color?>"  name="e_simple_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    </div>
    
    
    
    
    <input type="submit" value="Save" class="btn btn-primary">
</form>

    <?php
  }else{
    ?>
        <form action="{{ route('employee-attendence-settings.store') }}" method="POST">
    @csrf 
   
     <div class="row">
     <div class="col-6">
        <div class="form-group mb-4">
        <h3>Employees</h3>
        
        </div>

    </div>
     </div>                                       
    <div class="row">
    
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Present Color</label>
        <input type="color"   name="e_p_color" id="present_color" style="min-height:100
        ">
        </div>

    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Absent Color</label>
        <input type="color"   name="e_a_color" id="present_color" style="min-height:100
        ">
        </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Leave Color</label>
        <input type="color"   name="e_l_color" id="present_color" style="min-height:100
        ">
        </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Half Day Color</label>
        <input type="color"   name="e_h_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Sunday Color</label>
        <input type="color"   name="e_sunday_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Holiday Color</label>
        <input type="color"   name="e_holiday_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    <div class="col-6">
        <div class="form-group mb-4">
        <label for="name">Simple Color</label>
        <input type="color"   name="e_simple_color" id="present_color" style="min-height:100
        ">
       </div>
            
    </div>
    </div>
    
    
    
    
    <input type="submit" value="Create" class="btn btn-primary"><br>
</form>

    <?php
  }                               
?>
<hr>
<form action="{{ route('employee-holidays.store') }}" method="POST">
@csrf 
    <div class="row">
    <div class="col-12">
        <div class="form-group">
        <label for="name">Holidays</label>
       
        </div>

    </div>
    <div class="col-8">
        <div class="form-group">
        <input type="date" value="" required name="date" class="form-control">
        </div>

    </div>
    <div class="col-4">
        <div class="form-group">
        <input type="submit" value="Add" class="form-control btn btn-success"><br>
        </div>

    </div>
    </div>

</form>
<hr>
<div class="row">
     <?php
      $em_holi=App\Http\Controllers\EmployeesAttendenceHolidaysController::getHolidays();
       if($em_holi){
        foreach($em_holi as $h){
      ?>
        <p id="item_{{$h->id}}" class="col-5 border shadow m-2 p-1 rounded"><?=date('d M Y',strtotime($h->date))?> 
        <button style="background:none; padding:0px"  onclick="deleteItem(<?=$h->id?>, 'student-holidays/')" type="submit" class="btn btn-link"><a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </a></button></p>

      <?php
      }
      }
     ?>

</div>
     

</div>



