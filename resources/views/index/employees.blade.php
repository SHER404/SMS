<?php
                                  $employees=App\Http\Controllers\EmployeesController::total_employees();
                                 
                                  ?>
                                
                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid bg-warning widget-engagement">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <i class="far fa-address-book"></i>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$employees}}</p>
                                                    <h5 class="text-light">Total Employees</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                        <a href="/employees" class="btn btn-outline-light">View</a>
                                                    </p>
                                                   
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                           
