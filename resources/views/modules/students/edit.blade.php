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
                                        <li class="breadcrumb-item"><a href="/students">Students</a></li>
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
                                                <h4>Edit Students</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('students.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                        @method('PUT')
                                        <div class="row mb-4">
                                        <div class="col-8">
                                        <div class="row mb-4">
                                                <div class="col">
                                                    <label for="student_reg_id">Registration ID</label>
                                                    <input  value="{{$data->Registration_id}}" class="Registration_id form-control" id="Registration_id" type="text" placeholder="Registration ID." readonly>
                                                </div>
                                                <div class="col">
                                                    <label for="reg_date">Registration Date</label>
                                                    <input id="Registration_date" name="Registration_date" value="{{$data->Registration_date}}"  type="date" class="form-control" placeholder="Registration Date">
                                                </div>
                                                
                                            </div>    

                                            <div class="form-group mb-4">
                                                <label for="student_name">Student Name (English)</label>
                                                <input type="text" class="form-control" value="{{$data->student_name}}" id="student_name" name="student_name" placeholder="Student Name">
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="father_name">Father Name</label>
                                                    <select name="father_name" id="father_name" class="father_select2 form-control">
                                                        <option value="{{$data->father_name}}">Select Father</option>
                                                    @foreach($parents as $datas)
                                                <option value="{{$datas->id}}" <?php if($data->father_name==$datas->id){ echo "selected";}?>>{{$datas->father_name}}</option>

                                                @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="cast">Tribe or Cast</label>
                                                    <input id="cast" name="cast" value="{{$data->cast}}" type="text" class="form-control" placeholder="Tribe or Cast Name">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="student_dob">Date of Birth</label>
                                                    <input id="dob" name="dob" value="{{$data->dob}}" type="date" class="form-control" placeholder="DOB">
                                                </div>
                                                <div class="col">
                                                    <label for="birth_place">Place of Birth</label>
                                                    <input id="birth_place" name="birth_place" value="{{$data->birth_place}}" type="text" class="form-control" placeholder="Place Of Birth">
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="student_address">Address</label>
                                                <input type="text" class="form-control" value="{{$data->address}}" name="address" id="address" placeholder="Student Address">
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="student_city">City</label>
                                                    <select id="city" name="city" class="select2 form-control">
                                                    @foreach($city as $datas)
                                                      <option value="{{$datas->id}}" <?php if($data->city_id==$datas->id){ echo "selected";}?>>{{$datas->name}}</option>

                                                    @endforeach
                          
                            
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="student_nationality">Nationality</label>
                                                    <select id="nationality" name="nationality" class="select2 form-control">
                                                        
                                            
                                                    @foreach($country as $datas)
                                                      <option value="{{$datas->id}}" <?php if($data->country_id==$datas->id){ echo "selected";}?>>{{$datas->name}}</option>

                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                           
                                            <div class="form-group mb-4">
                                                <label for="admission_required_level">Level in Which Addmission Required</label>
                                                <input type="text" value="{{$data->level_admision}}" class="form-control" id="level_admision" name="level_admision" placeholder="Level in Which Addmission Required">
                                            </div>


                                            <div class="form-group mb-4">
                                                <label for="studying_level">Level in Which Studying</label>
                                                <input type="text" class="form-control" value="{{$data->level_study}}" id="level_study" name="level_study" placeholder="Level in Which Studying">
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="student_religion">Religion</label>
                                                    <select id="religion" name="religion"  class="select2 form-control">
                                                        
                                                        <option <?php if($data->religion==='Muslim'){ echo 'selected';}?>>Muslim</option>
                                                        <option <?php if($data->religion==='Hindu'){ echo 'selected';}?>>Hindu</option>
                                                        <option <?php if($data->religion==='Christian'){ echo 'selected';}?>>Christian</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="student_gender">Gender</label>
                                                    <select id="gender" name="gender" class="select2 form-control">
                                                        <option <?php if($data->gender==='Male'){ echo 'selected';}?>>Male</option>
                                                        <option <?php if($data->gender==='Female'){ echo 'selected';}?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="row mb-4">
                                            <div class="col-6">
                                                    <label for="whatsapp_1">Whatsapp A</label>
                                                    

                                                    <!--- repeater button ---> 
                                                    <div class="input-group mb-3">
                                                    <input id="whatsapp_1" name="whatsapp_1" value="{{$data->whatsapp_1}}" type="text" class="form-control" placeholder="For what i have learnt">
                                                    
                                                    </div>
                                                   
                                                    
                                                </div>
                                                <div class="col-6">
                                                <label for="whatsapp_2">Whatsapp B</label>
                                                    

                                                    <!--- repeater button ---> 
                                                    <div class="input-group mb-3">
                                                    <input id="whatsapp_2" name="whatsapp_2" value="{{$data->whatsapp_2}}" type="text" class="form-control" placeholder="For what i have learnt">
                                                    
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-6">
                                                <label for="whatsapp_3">Whatsapp C</label>
                                                    

                                                    <!--- repeater button ---> 
                                                    <div class="input-group mb-3">
                                                    <input id="whatsapp_3" name="whatsapp_3" value="{{$data->whatsapp_3}}" type="text" class="form-control" placeholder="For what i have learnt">
                                                    
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="father_occupation">Father Occupation</label>
                                                    <input id="father_occup" value="{{$data->father_occup}}" name="father_occup" type="text" class="form-control" placeholder="Father Occupation">
                                                </div>
                                                <div class="col">
                                                    <label for="home_school_distance">Home to School Distance</label>
                                                    <input id="home_distance" value="{{$data->home_distance}}" name="home_distance" type="text" class="form-control" placeholder="Home to School Distance">
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="family_id">Family Id</label>
                                                    <select id="family_id" name="family_id" class="family_select2 form-control">
                                                    @foreach($families as $datas)
                                                <option value="{{$datas->custom_id}}"  <?php if($data->family_id==$datas->custom_id){ echo "selected";}?>>{{$datas->family_name}}</option>

                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="student_status">Student Status</label>
                                                    <select id="student_status" name="student_status" class="select2 form-control">
                                                        
                                                        <option <?php if($data->student_status==='Active'){ echo 'selected';}?>>Active</option>
                                                        <option <?php if($data->student_status==='Inactive'){ echo 'selected';}?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="student_class">Class</label>
                                                    <select id="class_id" name="class_id" onchange="getSectionsEdit(this.value,<?=$data->section_id?>)" class="class_select2 form-control">
                                                    @foreach($classes as $datas)
                                                <option value="{{$datas->id}}" <?php if($data->class_id==$datas->id){ echo "selected";}?>>{{$datas->class_name}}</option>

                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="class_section">Class Section</label>
                                                    <select id="section_id" name="section_id" class="section_select2 form-control">
                                                        @foreach($sections as $datas)
                                                        <?php if($data->class_id==$datas->class_id){?>
                                                        <option value="{{$datas->id}}" <?php if($data->section_id==$datas->id){ echo "selected";}?>>{{$datas->section_name}}</option>
                                                        <?php }?>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="referred_by">Referred By</label>
                                                    <select id="reffered_by" name="reffered_by" class="select2 form-control">
                                                         <option value="" > Choose One..</option>    
                                                        @foreach($employees as $datas)
                                                         <option value="{{$datas->employee_name}}" <?php if($data->reffered_by===$datas->employee_name){ echo 'selected';}?>>{{$datas->employee_name}}</option>

                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="name">Name</label>
                                                    <input id="name" value="{{$data->name}}" type="text" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="col">
                                                    <label for="fee_activation_date">Fee activation date <span class="text-danger"><strong>*</strong></span></label>
                                                    <input id="fee_activation_date"  value="{{$data->fee_activation_date}}" name="fee_activation_date" class="form-control" required type="date">
                                                        
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                @hasrole('Super Admin')
                                                <div class="col">
                                                    <label for="campus_admission_at">Campus</label>
                                                    <select id="campus_id" name="campus_id" class="select2 form-control">
                                                    @foreach($campus as $datas)
                                                    <option value="{{$datas->id}}" <?php if($data->campus_id==$datas->id){ echo "selected";}?>>{{$datas->campus_name}}</option>

                                                    @endforeach
                                                    </select>
                                                </div>
                                                @endhasrole
                                                <div class="col">
                                                    <label for="teams_id">Online Teams Id</label>
                                                    <input id="online_team" value="{{$data->online_team}}" name="online_team" type="text" class="form-control" placeholder="Online Teams ID">
                                                </div>
                                                

                                                
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="parent_id">Parents</label>
                                                    <select id="parent_id" name="parent_id" class="select2 form-control">
                                                    @foreach($parents as $datas)
                                                <option value="{{$datas->id}}" <?php if($data->father_name==$datas->id){ echo "selected";}?>>{{$datas->father_name}}</option>

                                                @endforeach
                                                    </select>
                                                </div>
                                                @hasrole('Super Admin')
                                                <div class="col">
                                                    <label for="academic_session_id">Academic Session</label>
                                                    <select id="academic_session_id" name="academic_session_id" class="select2 form-control">
                                                    @foreach($sessions as $datas)
                                                    <option value="{{$datas->id}}" <?php if($data->academic_session_id==$datas->id){ echo "selected";}?>>{{$datas->starting_year}}-{{$datas->ending_year}}</option>

                                                    @endforeach
                                                        
                                                    </select>
                                                </div>
                                                @endhasrole
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
                                                 <input type="submit" class="btn btn-primary">
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