                                  <?php
                                  $invoices=App\Http\Controllers\InvoicesController::total_invoices();
                                  $thisMonth=0;
                                  $thisSession=0;
                                  $thisSessionMega=0;
                                  $thism=date('m');
                                  $feeheads=App\Http\Controllers\FeeHeadController::all_feeheads();
                                  $allinvoices=App\Http\Controllers\InvoicesController::all_invoices();
                                  foreach($allinvoices as $inv){
                                    foreach($inv->Invoice_heads as $ih){
                                        $thisSession+=$ih->paid_amount;
                                        $thisSessionMega+=$ih->mega_discount;
                                        $thismm=date('m',strtotime($inv->fee_date));
                                        if($thism==$thismm){
                                            $thisMonth+=$ih->paid_amount;

                                        }

                                    }
                                 }
                                 $campus=App\Http\Controllers\Controller::globalSettingsBlade();
                                 
                                  $start_year=$campus->session?->starting_year;
                                  $end_year=$campus->session?->ending_year;
                                  ?>
                                
                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid bg-secondary widget-engagement">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <i class="far fa-chart-bar"></i>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$invoices}}</p>
                                                    <h5 class="text-light">Total Invoices</h5>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="text-end m-2">
                                         <p class="w-value text-light">
                                                    <i class="far fa-star"></i>
                                                    </p>
                                                   
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid bg-dark widget-engagement">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <i class="far fa-chart-bar"></i>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$thisMonth}}</p>
                                                    <h5 class="text-light">Fee Rceived (<?php echo date('M');?>)</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                    <i class="far fa-star"></i>
                                                    </p>
                                                   
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid  widget-engagement" style="background-color:blueviolet;">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <i class="far fa-chart-bar"></i>
                                                </div>
                                                <div class="">
                                                    <p class="w-value text-light">{{$thisSession}}</p>
                                                    <h5 class="text-light">Fee Rceived Students Session(<?php echo  date('M Y',strtotime($start_year))?>--<?php echo date('M Y',strtotime($end_year))?>)</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       <div class="text-end m-2">
                                       <p class="w-value text-light">
                                                    <i class="far fa-star"></i>
                                                    </p>
                                                   
                                        </div>
                                        
                                    </div>
                                </div>

                                
