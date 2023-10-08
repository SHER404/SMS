
<?php
                                  $attendence=App\Http\Controllers\StudentAttendenceController::getAttendence();
                                 
                                  ?>
                                  <style>
                                    .ip_c{
                                        margin: 5px;
                                        border: 1px solid wheat;
                                        box-shadow: 5px 5px 5px black;
                                        border-radius: 10px;
                                        padding-left: 10px;
                                        padding-right: 10px;
                                        text-align: center;
                                    }
                                  </style>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid bg-info widget-referral">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                                   
                                                </div>
                                                <div class="ip_c">
                                                    <p class="w-value text-light">{{$attendence['all']}}</p>
                                                    <h5 class="text-light">Total</h5>
                                                </div>
                                                <div class="ip_c">
                                                    <p class="w-value text-light">{{$attendence['p']}}</p>
                                                    <h5 class="text-light">P</h5>
                                                </div>
                                                <div class="ip_c">
                                                    <p class="w-value text-light">{{$attendence['a']}}</p>
                                                    <h5 class="text-light">A</h5>
                                                </div>
                                                <div class="ip_c">
                                                    <p class="w-value text-light">{{$attendence['l']}}</p>
                                                    <h5 class="text-light">L</h5>
                                                </div>
                                                <div class="ip_c">
                                                    <p class="w-value text-light">{{$attendence['h']}}</p>
                                                    <h5 class="text-light">H</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end m-2">
                                                    <p class="w-value text-light">
                                                         
                                                         <form action="/student-attendence" method="Post">
                                                             @csrf
                                                            <a href="javascript:{}" class="btn btn-outline-light" onclick="this.closest('form').submit();">Student Attendence</a>
                                                         </form>
                                                    </p>
                                                   
                                        </div>
                                       
                                    </div>
                                </div>


                                
                               
                           
