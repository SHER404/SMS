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
                                        <li class="breadcrumb-item"><a href="/families">Families</a></li>
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
                                                <h4>Add Family</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form action="{{ route('families.store') }}" method="POST">  
                                            @csrf

                                                <div class="form-group mb-4">
                                                    <label for="family_name">Family Name</label><br>
                                                    <input id="family_name" name="family_name" type="text" placeholder="Family Unique Name" class="form-control">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="fathers_ids">Select Father's CNIC's</label><br>
                                                    <select name="fathers_ids[]" id="fathers_ids" class="vanilla_fatherscnic" multiple>
                                                    @foreach($parents as $datas)
                                                <option value="{{$datas->id}}">{{$datas->father_cnic}}</option>

                                                @endforeach
                                                    </select>
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