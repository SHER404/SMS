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
                                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                        <div class="row p-4">
                                            <div class="col-8">
                                            <div class="row ">
                                            

                                            
                                            <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="name">Name <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" required name="name" id="name" placeholder="name">
                                            </div>
                                            <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="email">Email <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" required name="email" id="email" placeholder="email">                                                
                                               </div>

                                               <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="password">Password <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" required name="password" id="password" placeholder="password">                                                
                                               </div>

                                               <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                
                                                    <label for="student_city">Campus <span class="text-danger">*</span> </label>
                                                    <select id="campus_id" name="campus_id" required class="select2 form-control">
                                                    @foreach($campuses as $datas)
                                                      <option value="{{$datas->id}}">{{$datas->campus_name}}</option>

                                                    @endforeach
                          
                                                    </select>
                                                </div>

                                               <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                               
                                                    <label for="user_type">User Type <span class="text-danger">*</span> </label>
                                                    <select id="user_type" name="user_type" required  class="select2 form-control">
                                                        <option>Choose One..</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                               
                                             </div>
                                            <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="dob">DOB</label>
                                                <input type="date" class="form-control" name="dob" id="dob" placeholder="DOB">
                                            </div>
                                            <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="joining_date">Joining date</label>
                                                <input type="date" class="form-control" name="joining_date" id="joining_date" placeholder="Joining date">
                                            </div>
                                            <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="adress">Adress</label>
                                                <input type="text" class="form-control" name="adress" id="adress" placeholder="Address">
                                            </div>
                                            <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="employee_phone">Phone</label>
                                                <input type="text" class="form-control" name="employee_phone" id="employee_phone" placeholder="Phone">
                                            </div>
                                            <div class="form-group mb-4 col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                <label for="employee_cnic">CNIC</label>
                                                <input type="text" class="form-control" name="employee_cnic" id="employee_cnic" placeholder="CNIC">
                                            </div>
                                            
                                           </div>
                                            
                                            

                                            </div>
                                            <div class="col-4">
                                             <div class="row">
                                                <div class="form-group mb-5">
                                                  <div class="col-12 text-center myborder2">    
                                                       <label for="screen_shot" class="drop-container">
                                                       <img id="myimage" src="/assets/img/product-camera.jpg" alt="your image" />
                                                       <input type="file" name="file" id="imgInp" class="form-control" accept="image/*">   
                                                       </label>
									             </div>  
                                                </div>
                                                </div>

                                           </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-3 m-2">
                                                    <input type="submit" class="btn btn-primary">

                                                    </div>

                                                </div>
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