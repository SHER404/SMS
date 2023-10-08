@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php
                               $collectionOfRoles=App\Http\Controllers\UserRoleController::allRoles();
                              ?>
                          @if(auth()->user()->hasAnyRole($collectionOfRoles))
                            <div class="row widget-statistic">
                            
                          <!-- Familes  -->
                          @if(auth()->user()->hasDirectPermission('dashboard-families'))
                          @include('index.families')
                          @endif
                          <!-- Familes end -->
                          <!-- Students  -->
                          @if(auth()->user()->hasDirectPermission('dashboard-students'))
                          @include('index.students')
                          @endif
                          <!-- Students end -->
                          <!-- Invoices  -->
                          @if(auth()->user()->hasDirectPermission('dashboard-invoices'))
                          @include('index.invoices')
                          @endif
                          <!-- Invoices end -->
                           <!-- classes  -->
                          @if(auth()->user()->hasDirectPermission('dashboard-classes'))
                          @include('index.classes')
                          @endif
                          <!-- classes end -->
                          <!-- Sections  -->
                          @if(auth()->user()->hasDirectPermission('dashboard-sections'))
                          @include('index.sections')
                          @endif
                          <!-- Sections end -->
                          <!-- Employees  -->
                          @if(auth()->user()->hasDirectPermission('dashboard-employees'))
                          @include('index.employees')
                          @endif
                          <!-- Employees end --> 
                          <!-- Std Birthday List  -->
                          @if(auth()->user()->hasDirectPermission('dashboard-birthday'))
                          @include('index.birthday')
                          @endif

                          <!-- StudentAttendence -->
                          @if(auth()->user()->hasDirectPermission('dashboard-student-attendence'))
                          @include('index.student_attendence')
                          @endif
                        </div>
                        <div class="row widget-statistic">
                        <!-- end Std Birthday List --> 
                          <!-- Income List  -->
                          @if(auth()->user()->hasDirectPermission('dashboard-income-list'))
                          @include('index.income_list')
                          @endif
                          <!-- Income List end --> 
                          <!-- Invoice List  -->
                          @if(auth()->user()->hasDirectPermission('dashboard-invoice-list'))
                          @include('index.invoice_list')
                          @endif
                          <!-- Invoice List end --> 
                        </div>
                        @endif
                </div>

            </div>
            </div>

     </div>

@endsection