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
                                        <li class="breadcrumb-item"><a href="/parents">Parents</a></li>
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
                                                <h4>Edit Parent</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                    <form action="{{route('parents.update',$data->id)}}" method="POST">

@csrf 
@method('PUT')

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="father_name">Father/Guardian Name</label>
                                                        <input type="text" value="{{$data->father_name}}" class="form-control" name="father_name" id="father_name" placeholder="Father Name">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="mother_name">Mother Name</label>
                                                        <input type="text" value="{{$data->mother_name}}" class="form-control" name="mother_name" id="mother_name" placeholder="Mother Name">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="father_cnic">Father/Guardian CNIC</label>
                                                        <input type="text" value="{{$data->father_cnic}}" class="form-control" name="father_cnic" id="father_cnic" placeholder="Father CNIC">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="mother_cnic">Mother CNIC</label>
                                                        <input type="text" value="{{$data->mother_cnic}}" class="form-control" name="mother_cnic" id="mother_cnic" placeholder="Mother CNIC">
                                                    </div>
                                                </div>
                                            </div>   
                                            
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="father_cnic">Father/Guardian Education</label>
                                                        <input type="text" value="{{$data->father_cnic}}" class="form-control" name="father_cnic" id="father_cnic" placeholder="Father CNIC">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="mother_cnic">Mother Education</label>
                                                        <input type="text" value="{{$data->mother_cnic}}" class="form-control" name="mother_cnic" id="mother_cnic" placeholder="Mother CNIC">
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="father_occupation">Father/Guardian Occupation</label>
                                                        <input type="text" class="form-control" value="{{$data->father_occupation}}" name="father_occupation" id="father_occupation" placeholder="Father Occupation">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="mother_occupation">Mother Occupation</label>
                                                        <input type="text" class="form-control" value="{{$data->mother_occupation}}" name="mother_occupation" id="mother_occupation" placeholder="Mother Occupation">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="father_office_tel">Father/Guardian Office Tel</label>
                                                        <input type="text" class="form-control" value="{{$data->father_office_tel}}" name="father_office_tel" id="father_office_tel" placeholder="Father Office Tel">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="mother_office_tel">Mother Office Tel</label>
                                                        <input type="text" class="form-control" value="{{$data->mother_office_tel}}" name="mother_office_tel" id="mother_office_tel" placeholder="Mother Office Tel">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="father_office_tel">Father/Guardian Office Tel</label>
                                                        <input type="text" class="form-control" value="{{$data->father_office_tel}}" name="father_office_tel" id="father_office_tel" placeholder="Father Office Tel">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="mother_office_tel">Mother Office Tel</label>
                                                        <input type="text" class="form-control" value="{{$data->mother_office_tel}}" name="mother_office_tel" id="mother_office_tel" placeholder="Mother Office Tel">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="father_mobile">Father/Guardian Mobile</label>
                                                        <input type="text" class="form-control" value="{{$data->father_mobile}}" name="father_mobile" id="father_mobile" placeholder="Father Mobile">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="mother_mobile">Mother Mobile</label>
                                                        <input type="text" class="form-control" name="mother_mobile" id="mother_mobile" value="{{$data->mother_mobile}}" placeholder="Mother Mobile">
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