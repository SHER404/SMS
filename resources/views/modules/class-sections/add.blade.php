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
                                        <li class="breadcrumb-item"><a href="/class-sections">Class Section</a></li>
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
                                                <h4>Add Class Section</h4>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('class-sections.store') }}" method="POST">
                                        @csrf 
                                            
                                            <div class="form-group mb-4">
                                                <label for="section_name">Class Section Name</label>
                                                <input type="text" class="form-control" name="section_name" id="section_name" placeholder="Class Section Name">
                                            </div>

                                            
                                            <div class="form-group mb-4">
                                                <label for="section_name">Class</label>
                                                <select name="class_id" id="" class="vanilla_classsection">
                                                @foreach($data as $datas)
                                                <option value="{{$datas->id}}">{{$datas->class_name}}</option>

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