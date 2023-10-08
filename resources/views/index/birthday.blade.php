<?php
                                  $birthday=App\Http\Controllers\StudentsController::birthday_students();
                                  $birthday_emp=App\Http\Controllers\EmployeesController::birthday_employees();
                                 
                                  ?>
                                
                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid  widget-engagement" style="background-color: #717D7E;">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <i class="far fa-clone"></i>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$birthday}}</p>
                                                    <h5 class="text-light">Students Birthday </h5>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                        <a href="/studentsBirthdays" class="btn btn-outline-light">View</a>
                                                    </p>
                                                   
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid  widget-engagement" style="background-color: #717D7E;">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <i class="far fa-clone"></i>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$birthday_emp}}</p>
                                                    <h5 class="text-light">Employees Birthday </h5>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                        <a href="/employeesBirthdays" class="btn btn-outline-light">View</a>
                                                    </p>
                                                   
                                        </div>
                                        
                                    </div>
                                </div>
                           

                           
