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
                                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                                <h4>Edit Employee</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                    <form action="{{route('employees.update', $data->id)}}" method="POST" enctype="multipart/form-data">

                                @csrf 
                                @method('PUT')

                                           <div class="row">
                                            <div class="col-8">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="employee_name">Employee Name</label>
                                                        <input type="text" value="{{$data->employee_name}}" class="form-control" name="employee_name" id="employee_name" placeholder="Employee Name">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="employee_cnic">Employee CNIC</label>
                                                        <input type="text" class="form-control" value="{{$data->employee_cnic}}" name="employee_cnic" id="employee_cnic" placeholder="Employee CNIC">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="employee_phone">Employee Phone</label>
                                                <input type="text" class="form-control" value="{{$data->employee_phone}}" name="employee_phone" id="employee_phone" placeholder="Employee Phone">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="employee_address">Employee Address</label>
                                                <input type="text" class="form-control" value="{{$data->adress}}" name="adress" id="adress" placeholder="Employee Address">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="employee_job">Employee Job/Post</label>
                                                <select id="employee_job" name="employee_job" required  class="select2 form-control">
                                                   <option value="">Choose One..</option>
                                                   @foreach($roles as $role)
                                                   <option <?php if($data->employee_job===$role->name){ echo 'selected';}?> value="{{$role->name}}">{{$role->name}}</option>
                                                   @endforeach
                                                  
                                               </select>
                                               
                                            </div>

                                            

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="employee_salary">Employee Salary</label>
                                                        <input type="text" class="form-control"  value="{{$data->employee_salery}}" name="employee_salery" id="employee_salery" placeholder="Employee Salary">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="employee_joining">Employee Joining Date</label>
                                                        <input type="date" class="form-control" value="{{$data->joining_date}}" name="joining_date" id="joining_date" placeholder="Employee Joining Date">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="dob">DOB</label>
                                                        <input type="date" class="form-control" value="{{$data->dob}}" name="dob" id="dob" placeholder="Employee DOB">
                                                    </div>
                                                </div>
                                            </div>


                                            </div>
                                            <div class="col-4">
                                        <div class="row">
                                                <div class="form-group mb-5">
                                                  <div class="col-12 text-center myborder2">
                                                            <?php
                                                              $url='assets/img/product-camera.jpg';
                                                              if($data->img!=null){
                                                                $url=$data->img;
                                                              }
                                                            ?>
                                                       <label for="screen_shot" class="drop-container">
                                                       <img id="myimage" src="/<?=$url?>" alt="your image" />
                                                       <input type="file" name="file" id="imgInp" class="form-control" accept="image/*">   
                                                       </label>
									             </div>  
                                            </div>
                                                </div>

                                        </div>
                                           </div>
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

@include('modules.employees.includes.modals')
@endsection            