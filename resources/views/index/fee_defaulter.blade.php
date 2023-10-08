<?php
                                  $def=App\Http\Controllers\ReportController::reportsDefaultersCount();
                                 
                                  ?>
                                
                                
                                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-engagement" style="background-color:#AF8B08;">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <i class="far fa-clipboard"></i>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$def}}</p>
                                                    <h5 class="text-light">Fee Defaulters ({{date('M')}})</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                    <form action="/reports-defaulters" method="Post">
                                                      @csrf
                                                      <a href="javascript:{}" onclick="this.closest('form').submit();" class="btn btn-outline-light">View</a>
                                                     </form>
                                                      
                                                    </p>
                                                   
                                        </div>
                                        
                                    </div>
                                </div>
                           
