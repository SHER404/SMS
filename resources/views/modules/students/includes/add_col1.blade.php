                                             <div class="row mb-4">
                                                <!-- <div class="col">
                                                    <label for="student_reg_id">Registration ID</label>
                                                    <input value="RA-005" class="Registration_id form-control" id="Registration_id" type="text" placeholder="Registration ID." readonly>
                                                </div>  -->
                                                <div class="col">
                                                    <label for="reg_date">Registration Date <span class="text-danger"><strong>*</strong></label>
                                                    <input name="Registration_date" id="Registration_date" type="date" required class="form-control" placeholder="Registration Date">
                                                </div>
                                            </div>    

                                            <div class="form-group mb-4">
                                                <label for="student_name">Student Name (English) <span class="text-danger"><strong>*</strong></label>
                                                <input type="text" class="form-control" id="student_name" required name="student_name" placeholder="Student Name">
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="father_name">Father Name <span class="text-danger"><strong>*</strong> <button type="button" data-bs-toggle="modal" data-bs-target="#addFather_Modal" class="btn btn-warning" id="no-results-btn">Create New Father</button></span></label>
                                                    <select name="father_name" id="father_name" class="father_select2 form-control" required>
                                                       <option value="" >Choose One..</option>
                                                        @foreach($parents as $datas)
                                                        <option value="{{$datas->id}}">{{$datas->father_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="cast">Tribe or Cast</label>
                                                    <input id="cast" name="cast" type="text" class="form-control" placeholder="Tribe or Cast Name">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="student_dob">Date of Birth</label>
                                                    <input id="dob" name="dob" type="date" class="form-control" placeholder="DOB">
                                                </div>
                                                <div class="col">
                                                    <label for="birth_place">Place of Birth</label>
                                                    <input id="birth_place" name="birth_place" type="text" class="form-control" placeholder="Place Of Birth">
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="student_address">Address</label>
                                                <input type="text" class="form-control" name="address" id="address" placeholder="Student Address">
                                            </div>

                                            <div class="row mb-4">
                                                 <div class="col">
                                                    <label for="student_nationality">Nationality  <button type="button" data-bs-toggle="modal" data-bs-target="#addCountry_Modal" class="btn btn-warning" id="no-results-btn">Create New Country</button></label>
                                                    <select id="nationality" name="nationality"  class="select2 form-control">
                                                    <option value="">Choose one.....</option>
                                                    @foreach($country as $datas)
                                                      <option value="{{$datas->id}}">{{$datas->name}}</option>

                                                    @endforeach
                          
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="student_city">Student City  <button type="button"  onclick="openmodalcity()" class="btn btn-warning" id="no-results-btn">Create New City</button></label>
                                                    <select id="city" name="city" class="select2 form-control">
                                                    <option value="">Choose one.....</option>
                                                    @foreach($city as $datas)
                                                      <option value="{{$datas->id}}">{{$datas->name}}</option>

                                                    @endforeach
                          
                                                    </select>
                                                </div>
                                                
                                                
                                            
                                                <div class="col">
                                                    <label for="student_town">Student Town  <button type="button" onclick="openmodaltown()" class="btn btn-warning" id="no-results-btn">Create New Town</button></label>
                                                    <select id="town" name="town" class="select2 form-control">
                                                        <option value="">Choose one.....</option>
                                                    @foreach($town as $datas)
                                                      <option value="{{$datas->id}}">{{$datas->name}}</option>

                                                    @endforeach
                          
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="student_res_phone">Res. Phone</label>
                                                        
                                                        <!--- res phone repeater --->
                                                        <div id="resphone_repeater">

                                                        <!--- repeater button ---> 
                                                        <div class="input-group mb-3">
                                                        <input id="rescue_phone" name="rescue_phone[]" type="text" class="form-control" placeholder="Res. Phone">
                                                        <button class="btn btn-secondary repeater-add-btn" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                                                        </div>
                                                        <!---ending repeater button ---> 
                                                            <div class=" rescue_phone items" data-group="rescue_phone">
                                                                <div class="input-group mb-3">
                                                                    <input id="rescue_phone" type="text" class="form-control" placeholder="Res. Phone">
                                                                    <!-- Repeater Remove Btn -->
                                                                    
                                                                        <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.rescue_phone').remove()">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                        </button>
                                                                   
                                                                    <!--- repeater remove btn end --->
                                                                    
                                                                </div>
                                                            </div>
                                                        </div><!--- ending res phone repeater div --->
                                                </div>

                                                <div class="col">
                                                    <label for="student_emergency_phone">Emergency Phone <span class="text-danger"><strong>*</strong></label>
                                                    <!--- emer phone repeater --->
                                                    <div id="emerphone_repeater">

                                                    <!--- repeater button ---> 
                                                    <div class="input-group mb-3">
                                                    <input id="emergency_phone" name="emergency_phone[] "type="text" required class="form-control" placeholder="Emergency Phone">
                                                    <button class="btn btn-secondary repeater-add-btn" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                                                    </div>
                                                    <!---ending repeater button ---> 
                                                        <div class="items emergency_phone" data-group="emergency_phone">
                                                            <div class="input-group mb-3">
                                                                <input  id="emergency_phone" type="text" class="form-control" placeholder="Emergency Phone">
                                                                <!-- Repeater Remove Btn -->
                                                                
                                                                    <button id="remove-btn" class="btn btn-danger" type="button" onclick="$(this).parents('.emergency_phone').remove()">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                    </button>
                                                            
                                                                <!--- repeater remove btn end --->
                                                                
                                                            </div>
                                                        </div>
                                                    </div><!--- ending emer phone repeater div --->
                                                    
                                                </div>
                                                </div>
                                                <div class="row mb-4">
                                                <div class="col-6">
                                                    <label for="whatsapp_1">Whatsapp A <span class="text-danger"><strong>*</strong></label>
                                                    

                                                    <!--- repeater button ---> 
                                                    <div class="input-group mb-3">
                                                    <input id="whatsapp_1" name="whatsapp_1" required type="text" class="form-control" placeholder="For what i have learnt">
                                                    
                                                    </div>
                                                   
                                                    
                                                </div>
                                                <div class="col-6">
                                                <label for="whatsapp_2">Whatsapp B</label>
                                                    

                                                    <!--- repeater button ---> 
                                                    <div class="input-group mb-3">
                                                    <input id="whatsapp_2" name="whatsapp_2" type="text" class="form-control" placeholder="For what i have learnt">
                                                    
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-6">
                                                <label for="whatsapp_3">Whatsapp C</label>
                                                    

                                                    <!--- repeater button ---> 
                                                    <div class="input-group mb-3">
                                                    <input id="whatsapp_3" name="whatsapp_3" type="text" class="form-control" placeholder="For what i have learnt">
                                                    
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="admission_required_level">Level in Which Addmission Required</label>
                                                <input type="text" class="form-control" id="level_admision" name="level_admision" placeholder="Level in Which Addmission Required">
                                            </div>


                                            <div class="form-group mb-4">
                                                <label for="studying_level">Level in Which Studying</label>
                                                <input type="text" class="form-control" id="level_study" name="level_study" placeholder="Level in Which Studying">
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="student_religion">Religion</label>
                                                    <select id="religion" name="religion"  class="select2 form-control">
                                                        <option>Choose One..</option>
                                                        <option>Muslim</option>
                                                        <option>Hindu</option>
                                                        <option>Sikh</option>
                                                        <option>Christian</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="student_gender">Gender <span class="text-danger"><strong>*</strong></label>
                                                    <select id="gender" name="gender" required class="select2 form-control">
                                                        <option>Choose One..</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="father_occupation">Father Occupation</label>
                                                    <input id="father_occup" name="father_occup" type="text" class="form-control" placeholder="Father Occupation">
                                                </div>
                                                <div class="col">
                                                    <label for="home_school_distance">Home to School Distance</label>
                                                    <input id="home_distance" name="home_distance" type="text" class="form-control" placeholder="Home to School Distance">
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="family_id">Family Id <span class="text-danger"><strong>*</strong> <button onclick="openmodal()" type="button" class="openBtn btn btn-warning" id="no-results-btn">New Family</button></label>
                                                    <select id="family_id" name="family_id" class="family_select2 form-control" required="">
                                                    @foreach($families as $datas)
                                                    <option value="{{$datas->custom_id}}">{{$datas->family_name}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="student_status">Student Status</label>
                                                    <select id="student_status" name="student_status" class="select2 form-control">
                                                        <option>Choose One..</option>
                                                        <option>Active</option>
                                                        <option selected>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="family_name">Family Name</label>
                                                    <input id="family_name" name="family_name" type="text" class="form-control" placeholder="Family Name">
                                                </div>
                                                <div class="col">
                                                    <label for="student_schedule">Schedule</label>
                                                    <select id="schedule" name="schedule" class="select2 form-control">
                                                        <option>Choose One..</option>
                                                        <option value="Monthly" selected>Monthly</option>
                                                        <option value="Quarterly">Quarterly</option>
                                                        <option value="Annually">Annually</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="health_problem">Health Problems Which Require Special Attention (Specify Details)</label>
                                                <!--- health issue repeater --->
                                                <div id="healthissue_repeater">

                                                <!--- repeater button ---> 
                                                <div class="input-group mb-3">
                                                <textarea class="form-control"  name="health_problem[]"  id="health_problem" placeholder="Health Problems Which Require Special Attention (Specify Details)"></textarea>
                                                <button class="btn btn-secondary repeater-add-btn" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                                                </div>
                                                <!---ending repeater button ---> 
                                                    <div class="health_problem items" data-group="health_problem">
                                                        <div class="input-group mb-3">
                                                        <textarea class="form-control"  id="health_problem" placeholder="Health Problems Which Require Special Attention (Specify Details)"></textarea>
                                                            <!-- Repeater Remove Btn -->
                                                            
                                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.health_problem').remove()">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                </button>
                                                        
                                                            <!--- repeater remove btn end --->
                                                            
                                                        </div>
                                                    </div>
                                                </div><!--- ending health issue repeater div --->
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="spoken_language">Language Spoken at Home</label>
                                                <!--- lang repeater --->
                                                <div id="spoken_repeater">

                                                <!--- repeater button ---> 
                                                <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="student_language[]" id="student_language" placeholder="Language Spoken at Home">
                                                <button class="btn btn-secondary repeater-add-btn" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                                                </div>
                                                <!---ending repeater button ---> 
                                                    <div class=" student_language items" data-group="student_language">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="student_language" placeholder="Language Spoken at Home">
                                                            <!-- Repeater Remove Btn -->
                                                            
                                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.student_language').remove()">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                </button>
                                                        
                                                            <!--- repeater remove btn end --->
                                                            
                                                        </div>
                                                    </div>
                                                </div><!--- ending lang repeater div --->
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="family_member">Family Members Living In The Same House (Mention Relationship only e.g. Grandfather, Aunt etc)</label>
                                                <!--- lang repeater --->
                                                <div id="familymembers_repeater">

                                                <!--- repeater button ---> 
                                                <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="family_member" name="family_member[]" placeholder="Family Members Living In The Same House (Mention Relationship only e.g. Grandfather, Aunt etc)">
                                                <button class="btn btn-secondary repeater-add-btn" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                                                </div>
                                                <!---ending repeater button ---> 
                                                    <div class=" family_member items" data-group="family_member">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="family_member" placeholder="Family Members Living In The Same House (Mention Relationship only e.g. Grandfather, Aunt etc)">
                                                            <!-- Repeater Remove Btn -->
                                                            
                                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.family_member').remove()">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                </button>
                                                        
                                                            <!--- repeater remove btn end --->
                                                            
                                                        </div>
                                                    </div>
                                                </div><!--- ending lang repeater div --->

                                                
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="student_class">Class <span class="text-danger"><strong>*</strong><button type="button" data-bs-toggle="modal" data-bs-target="#addClass_Modal" class="btn btn-warning" id="no-results-btn">New Class</button></span></label>
                                                    <select id="class_id" name="class_id" onchange="getSections(this.value)" class="class_select2 form-control" required="">
                                                    <option value="">Choose One..</option>
                                                    @foreach($classes as $datas)
                                                <option value="{{$datas->id}}">{{$datas->class_name}}</option>

                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="section_id">Class Section <span class="text-danger"><strong>*</strong><button type="button" data-bs-toggle="modal" onclick="openmodalsection()" data-bs-target="#addClassSection_Modal" class="btn btn-warning" id="no-results-btn">New Section</button></span></label>
                                                    <select id="section_id" name="section_id" class="section_select2 form-control" required="">
                                                    <option value="">Choose One..</option>
                                                        <!-- <@foreach($sections as $datas) -->
                                                        <!-- <option value="{{$datas->id}}">{{$datas->section_name}}</option> -->

                                                     <!-- @endforeach -->
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="referred_by">Referred By</label>
                                                    <select id="reffered_by" name="reffered_by" class="select2 form-control">
                                                        <option value="" > Choose One..</option>

                                                        @foreach($employees as $datas)
                                                        <option value="{{$datas->employee_name}}">{{$datas->employee_name}}</option>

                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                                
                                                <div class="col">
                                                    <label for="name">Name</label>
                                                    <input id="name" name="name" type="text" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="col">
                                                    <label for="fee_activation_date">Fee activation date <span class="text-danger"><strong>*</strong></span></label>
                                                    <input id="fee_activation_date" name="fee_activation_date" class="form-control" required type="date">
                                                        
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-4">
                                            @hasrole('Super Admin')
                                                <div class="col">
                                                    <label for="campus_admission_at">Campus <span class="text-danger"><strong>*</strong></label>
                                                    <select id="campus_id" name="campus_id" class="select2 form-control"  required="">
                                                    @foreach($campus as $datas)
                                                    <option value="{{$datas->id}}">{{$datas->campus_name}}</option>

                                                    @endforeach
                                                    </select>
                                                </div>
                                            @else
                                            <?php 
                                                    $campus=App\Http\Controllers\Controller::globalSettingsBlade();
                                                  
                                           ?>
                                             <input type="hidden" name="campus_id" value="{{$campus->id}}" id="campus_id">



                                            @endhasrole

                                                <div class="col">
                                                    <label for="teams_id">Online Teams Id</label>
                                                    <input id="online_team" name="online_team" type="text" class="form-control" placeholder="Online Teams ID">
                                                </div>
                                                

                                                
                                            </div>
                                            @hasrole('Super Admin')
                                            <div class="row mb-4">
                                               

                                                <div class="col">
                                                    <label for="academic_session_id">Academic Session <span class="text-danger"><strong>*</strong></label>

                                                    <select id="academic_session_id" name="academic_session_id" class="select2 form-control"  required="">
                                                        <option value="">Select Session</option>
                                                    @foreach($sessions as $datas)
                                                <option value="{{$datas->id}}">{{$datas->starting_year}}--{{$datas->ending_year}}</option>

                                                @endforeach
                                                        
                                                    </select>
                                                </div>
                                           </div>
                                           @else
                                           
                                             <!-- <input type="hidden" name="academic_session_id" value="{{$campus->session?->id}}" id="academic_session_id"> -->

                                             <div class="row mb-4">
                                               

                                               <div class="col">
                                                   <label for="academic_session_id">Academic Session <span class="text-danger"><strong>*</strong></label>

                                                   <select id="academic_session_id" name="academic_session_id" class="select2 form-control"  required="">
                                                       <option value="">Select Session</option>
                                                   @foreach($sessions as $datas)
                                               <option value="{{$datas->id}}"<?php if($datas->id==$campus->session?->id){ echo "selected";}?>>{{$datas->starting_year}}--{{$datas->ending_year}}</option>

                                               @endforeach
                                                       
                                                   </select>
                                               </div>
                                          </div>

                                           @endhasrole




