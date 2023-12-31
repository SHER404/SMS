<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Complaint Form </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/x-icon" href="/assets/src/assets/img/favicon.ico"/>
    <link href="/assets/layouts/vertical-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/vertical-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="/assets/layouts/vertical-dark-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/assets/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/vertical-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/vertical-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/assets/src/assets/css/light/pages/contact_us.css" rel="stylesheet" type="text/css" />
    @include('layout.includes.cssincludes')
    <link href="/assets/src/assets/css/dark/pages/contact_us.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body class=" layout-boxed">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="contact-us layout-top-spacing container">
        <div class="cu-contact-section">

            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12 mx-auto">
                  <form action="/store-complaint" method="post">
                  @csrf
                    <div class="card">
                        <div class="card-body">
    
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    
                                    <h2 class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> Complaint Form</h2>
                                    <p class="mb-0">Submit your queries and we will get back to you as soon as possible.</p>
                                    
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="mb-4">
                                        <div class="input-field-group">
                                            <label for="">Select Campus</label>
                                            <select id="campus_id" onchange="getClasses(this.value)" name="campus_id" required class="form-control ">
                                                  <option value="">Select Campus</option>
                                                    @foreach($campuses as $datas)
                                                     @if($datas->id!=1)
                                                      <option value="{{$datas->id}}"> {{$datas->campus_name}}</option>
                                                     @endif
                                                    @endforeach
                          
                                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="mb-4">
                                        <div class="input-field-group">
                                           
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <input type="text" class="form-control"  name="student_name" placeholder="Student Name ( Optional )">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12 ">
                                  <label for="student">Class</label>
                                 <select name="class_id" required onchange="getSections(this.value)"  id="class_search_id" class="form-control" >
                                   <option value="" >Choose One..</option>
                                  
                                 </select>
                               </div>
                               <div class="col-12">
                                <label for="section_id">Class Section </label>
                                <select id="section_id" name="section_id" required class="section_select2 form-control" >
                                <option value="">Choose One..</option>
                                                        
                                </select>
                               </div>
                                
                                <!-- <div class="col-12">
                                    <div class="mb-4">
                                        <div class="input-field-group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                </div> -->
                                <br>
                                <hr>

                               
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <div class="input-field-group">
                                           
                                            <label for="">Complainant Name</label>
                                            <input type="text" class="form-control" name="complainant_name" required placeholder="Complainant Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <div class="input-field-group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                            <input type="text" class="form-control" required name="complainant_whatsapp_number" placeholder="WhatsApp Number">
                                        </div>
                                    </div>
                                </div>
                                
                                
                               
                                
                                <div class="col-12">
                                    <div class="mb-4">
                                        <div class="input-field-group">
                                            <label for="">Category</label>
                                           
                                            <select class="form-control" required name="category">
                                                <option value="">Select Category</option>
                                                <option value="Behaviour">Behaviour</option>
                                                <option value="Teaching">Teaching</option>
                                                <option value="Administration">Administration</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <div class="input-field-group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                            <textarea class="form-control" cols="30" rows="4" required name="message" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                </div>    
                                <input type="hidden" name="status" value="InProcess" id="">                                            
                                <div class="col-12">
                                    <div class="mt-4">
                                        <button class="btn btn-secondary w-100">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    <!--  BEGIN FOOTER  -->
    <!-- <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © <span class="dynamic-year">2023</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div> -->
    <!--  END FOOTER  -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    @include('layout.includes.jsincludes')

    <script src="/assets/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="/assets/layouts/vertical-dark-menu/app.js"></script>
    
    <!-- END GLOBAL MANDATORY STYLES -->

</body>
</html>