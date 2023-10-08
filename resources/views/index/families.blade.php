
                                  <?php
                                  $families=App\Http\Controllers\FamilyController::total_families();
                                  $parents=App\Http\Controllers\StudentParentController::total_parents();
                                  ?>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid bg-info widget-referral">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                                </div>
                                                <div class="" style="margin-right:20px !important;">
                                                    <p class="w-value text-light">{{$families}}</p>
                                                    <h5 class="text-light">Total Families</h5>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$parents}}</p>
                                                    <h5 class="text-light">Total Parents</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                         <a href="/families" class="btn btn-outline-light">Familes</a>
                                                        <a href="/parents" class="btn btn-outline-light">Parents</a>
                                                    </p>
                                                   
                                        </div>
                                       
                                    </div>
                                </div>


                                
                               
                           
