<?php
                                  $classes=App\Http\Controllers\StudentClassController::total_classes();
                                 
                                  ?>
                                
                                
                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-engagement bg-danger">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <i class="far fa-clipboard"></i>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$classes}}</p>
                                                    <h5 class="text-light">Total Classes</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                        <a href="/classes" class="btn btn-outline-light">View</a>
                                                    </p>
                                                   
                                        </div>
                                        
                                    </div>
                                </div>
                           
