@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">

                        <div class="middle-content container-xxl p-0">

                            <!-- BREADCRUMB -->
                            <div class="page-meta">
                                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/class-sections">Add User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create New </li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- /BREADCRUMB -->

                            <!--- registration form start ---> 

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">                                
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Add User / Employee</h4>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="widget-content widget-content-area">
                                    <form action="store-emp-user" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                            <div class="row p-4">
                                            
                                              <input type="hidden" name="emp_id" value="{{$emp_id}}" id="">
                                              <input type="hidden" name="name" value="{{$emp_name}}" id="">
                                              <input type="hidden" name="user_type" value="{{$emp_type}}" id="">
                                              <input type="hidden" name="campus_id" value="{{$emp_campus}}" id="">
                                           
                                               <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="email">Email <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" required name="email" id="email" placeholder="email">                                                
                                               </div>

                                               <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="password">Password <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" required name="password" id="password" placeholder="password">                                                
                                               </div>

                                               

                                           
                                            
                                            
                                            

                                            
                                                
                                             <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                               
                                             <input type="submit" class="btn btn-primary mb-4 " value="Save">
                                          
                                            </div>
                                              
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--- registration form end ---> 
                        
                        <!--- main divs ending start --->
                        </div>
                    </div>
                </div>
            </div>

@endsection            