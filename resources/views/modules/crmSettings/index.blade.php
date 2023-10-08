
@extends('layout.layout')

@section('content')
    


        <!--  BEGIN CONTENT AREA  -->
        <div class="layout-px-spacing">

<div class="middle-content container-xxl p-0">

    <div class="row layout-top-spacing">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">CRM</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->


                    <div class="row">

                        <div id="tabsVerticalWithIcon" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area rounded-vertical-pills-icon">
                                    
                                    <div class="row mb-4 mt-3">
                                        <div class="col-sm-4 col-12">
                                            <div class="nav flex-column nav-pills mb-sm-0 mb-3" id="rounded-vertical-pills-tab" role="tablist" aria-orientation="vertical">
                                              <a class="nav-link mb-2 active mx-auto" id="rounded-vertical-pills-home-tab" data-bs-toggle="pill" href="#rounded-vertical-pills-home" role="tab" aria-controls="rounded-vertical-pills-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>Crm Settings</a>
                                              <a class="nav-link mb-2 mx-auto" id="rounded-vertical-pills-profile-tab" data-bs-toggle="pill" href="#rounded-vertical-pills-profile" role="tab" aria-controls="rounded-vertical-pills-profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Attendence Settings</a>
                                              <a class="nav-link mb-2 mx-auto" id="rounded-vertical-pills-messages-tab" data-bs-toggle="pill" href="#rounded-vertical-pills-messages" role="tab" aria-controls="rounded-vertical-pills-messages" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>Fee Settings</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-8 col-12">
                                            <div class="tab-content" id="rounded-vertical-pills-tabContent">
                                              <div class="tab-pane fade show active" id="rounded-vertical-pills-home" role="tabpanel" aria-labelledby="rounded-vertical-pills-home-tab">
                                              <?php
                                                   $data=App\Http\Controllers\CampusesController::crmSettings();
                                                   $session=App\Http\Controllers\CampusesController::crmSessions();
                                               ?>     
                                                @include('modules.crmSettings.includes.crm_settings')
                                                

                                                   
                                              </div>
                                              <div class="tab-pane fade" id="rounded-vertical-pills-profile" role="tabpanel" aria-labelledby="rounded-vertical-pills-profile-tab">
                                                <div class="media">
                                                @include('modules.crmSettings.includes.attendence')
                                                  </div>
                                              </div>
                                              <div class="tab-pane fade" id="rounded-vertical-pills-messages" role="tabpanel" aria-labelledby="rounded-vertical-pills-messages-tab">
                                                <div class="media">
                                                @include('modules.crmSettings.includes.fee_settings')
                                                  </div>
                                              </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                    

                                </div>
                            </div>
                        </div>
                </div>
                
            


    @endsection  