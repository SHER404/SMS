


                                  <?php
                                  
                                  $campusStudents=App\Http\Controllers\StudentsController::total_campusStudents();
                                  $students=App\Http\Controllers\StudentsController::total_students();
                                  $allclasses=App\Http\Controllers\StudentClassController::all_classes();
                                  $campus=App\Http\Controllers\Controller::globalSettingsBlade();
                                 
                                  $start_year=$campus->session?->starting_year;
                                  $end_year=$campus->session?->ending_year;
                                  ?>
                                  <script>
                                        let allstudents=[];
                                        let allclasses=[];
                                  </script>


                                 <?php 
                                 foreach($allclasses as $ac){
                                    $allstudents=App\Http\Controllers\StudentsController::all_students($ac->id);
                                   
                                    $classname=$ac->class_name;
                                    ?>
                                    <script>
                                       
                                     var classes='<?=$classname?>';
                                     var students=<?=$allstudents?>;
                                     allclasses.push(classes);
                                     allstudents.push(students);
                                   </script>

                                    <?php
                                    } 
                                   ?>
                                  


                            

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid bg-primary widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$campusStudents}}</p>
                                                    <h5 class="text-light">Total Students</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                        <!-- <span class="shadow p-1 bg-success">P : 3000</span>
                                                        <span class="shadow p-1 bg-danger">A : 2000</span>
                                                        <span class="shadow p-1 bg-dark">L : 1000</span> -->
                                                        <a href="/students" class="btn btn-outline-light">View</a>
                                                    </p>
                                                   
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid  widget-followers"  style="background-color:darkolivegreen;">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$students}}</p>
                                                    <h5 class="text-light">Total Students Session(<?php echo  date('M Y',strtotime($start_year))?>--<?php echo date('M Y',strtotime($end_year))?>)</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                        <a href="/students" class="btn btn-outline-light">View</a>
                                                    </p>
                                                   
                                        </div>
                                       
                                    </div>
                                </div>
                               
                           
                                
                           