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
                                        <li class="breadcrumb-item"><a href="/class-sections">Edit Student School</a></li>
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
                                                <h4>Edit Student School</h4>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('studentSchools.update', $data->id) }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                            
                                            <div class="form-group mb-4">
                                                <label for="school_name">Name</label>
                                                <input type="text" class="form-control" value="{{$data->school_name}}" name="school_name" id="school_name" placeholder="name">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="last_class">Last Class</label>
                                                <input type="text" class="form-control" value="{{$data->last_class}}" name="last_class" id="last_class" placeholder="last class">
                                               </div>

                                               <div class="form-group mb-4">
                                                <label for="from">From</label>
                                                <input type="date" class="form-control" value="{{$data->from}}" name="from" id="from" placeholder="from ">
                                               </div>

                                               <div class="form-group mb-4">
                                                <label for="to">To</label>
                                                <input type="date" class="form-control" value="{{$data->to}}" name="to" id="to" placeholder="to ">
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