<?php
                                  $sections=App\Http\Controllers\ClassSectionController::total_sections();
                                 
                                  ?>
                                
                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid bg-success widget-engagement">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <i class="far fa-clone"></i>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$sections}}</p>
                                                    <h5 class="text-light">Total Sections</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                        <a href="/class-sections" class="btn btn-outline-light">View</a>
                                                    </p>
                                                   
                                        </div>
                                        
                                    </div>
                                </div>
                           
