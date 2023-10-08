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
                                        <li class="breadcrumb-item"><a href="/country">Country</a></li>
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
                                                <h4>Edit Country</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                   
                                        <form action="{{route('country.update',$data->id)}}" method="POST">

                                        @csrf 
                                        @method('PUT')
                                        
                                            
                                        <div class="form-group mb-4">
                                                <label for="name">Country Name</label>
                                                <input type="text" class="form-control" value="{{$data->name}}" name="name" id="name" placeholder=" Name">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="shortname">Short Name</label>
                                                <input type="text" class="form-control" value="{{$data->shortname}}"  name="shortname" id="shortname" placeholder="Short Name">
                                            </div>
                                            
                                            <div class="form-group mb-4">
                                                <label for="phone_Code">Phone Code</label>
                                                <input type="text" class="form-control" value="{{$data->phonecode}}"  name="phonecode" id="phonecode" placeholder="phonecode">
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

@include('modules.students.includes.modals')

@endsection            