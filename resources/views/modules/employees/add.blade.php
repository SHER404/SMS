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
                                        <li class="breadcrumb-item"><a href="/employees">Employees</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create New</li>
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
                                                <h4>Add Employee</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                                <div class="col-8">
                                                <div class="row">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="employee_name">Employee Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" required name="employee_name" id="employee_name" placeholder="Employee Name">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="employee_cnic">Employee CNIC <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" required name="employee_cnic" id="employee_cnic" placeholder="Employee CNIC">
                                                    </div>
                                                </div>
                                                
                                           
                                                
                                               </div>
                                               <div class="row">
                                               <div class="col">
                                            <div class="form-group mb-4">
                                                <label for="employee_address">Employee Address</label>
                                                <input type="text" class="form-control" name="adress" id="adress" placeholder="Employee Address">
                                            </div>
                                            </div>
                                            <div class="col">
                                               <div class="form-group mb-4">
                                                <label for="employee_phone">Employee Phone</label>
                                                <input type="text" class="form-control" name="employee_phone" id="employee_phone" placeholder="Employee Phone">
                                               </div>
                                               </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="employee_salary">Employee Salary</label>
                                                        <input type="text" class="form-control" name="employee_salery" id="employee_salery" placeholder="Employee Salary">
                                                    </div>
                                                </div>
                                            </div>
                                           

                                            <div class="row">
                                               
                                                
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="employee_joining">Employee Joining Date</label>
                                                        <input type="date" class="form-control" name="joining_date" id="joining_date" placeholder="Employee Joining Date">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                <div class="form-group mb-4">
                                                <label for="dob">DOB</label>
                                                <input type="date" class="form-control" name="dob" id="dob" placeholder="DOB">
                                                </div>
                                            </div>
                                                 <div class="col">
                                                 <div class="form-group mb-4 ">
                                               
                                               <label for="employee_job">Employee Job/Post  <span class="text-danger">*</span></label>
                                               <select id="employee_job" name="employee_job" required  class="select2 form-control">
                                                   <option value="">Choose One..</option>
                                                   @foreach($roles as $role)
                                                   <option value="{{$role->name}}">{{$role->name}}</option>
                                                   @endforeach
                                                  
                                               </select>
                                          
                                        </div>
                                                 </div>
                                            </div>


                                            <!-- ///////////////////////////  User Data -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                    <div class="switch form-switch-custom switch-inline form-switch-primary form-switch-custom inner-text-toggle">
                                                         <div class="input-checkbox">
                                                             <span class="switch-chk-label label-left">ON</span>
                                                             <input class="switch-input" onchange="userStatus()" type="checkbox" name="is_user" role="switch" id="is_user" >
                                                             <span class="switch-chk-label label-right">OFF</span>
                                                         </div>
                                                         <label class="switch-label" for="form-custom-switch-inner-text">Create User</label>
                                                     </div>
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>

                                            <div class="userClass d-none" id="user_status">
                                                <div class="row">
                                                    <div class="col">
                                                    <div class="form-group mb-4 ">
                                                     <label for="email">Email  </label>
                                                      <input type="text" class="form-control"  name="email" id="email" placeholder="email">                                                
                                                    </div>
                                                    </div>
                                                  

                                               <div class="col">
                                               <div class="form-group mb-4 ">
                                                <label for="password">Password  </label>
                                                <input type="text" class="form-control" name="password" id="password" placeholder="password">                                                
                                               </div>
                                               </div>

                                               <div class="col">
                                               <div class="form-group mb-4 ">
                                                
                                                <label for="student_city">Campus  </label>
                                                <select id="campus_id" name="campus_id"  class="select2 form-control">
                                                @foreach($campuses as $datas)
                                                  <option value="{{$datas->id}}">{{$datas->campus_name}}</option>

                                                @endforeach
                      
                                                </select>
                                            </div>

                                               </div>
                                               
                                            
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

                                            
                                            
                                            <!-- ///////////////////////////  User Data -->
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-3">
                                                    <input type="submit" class="btn btn-primary">

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
            <script>
              function userStatus(){
                if(document.getElementById('is_user').checked){
                    $("#user_status").removeClass('d-none');
                }else{
                    $("#user_status").addClass('d-none');
                }

                }
            </script>

@include('modules.employees.includes.modals')
@endsection            