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
                                                <h4>Edit Class Section</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('class-sections.update', $data->id) }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        
                                            <div class="form-group mb-4">
                                                <label for="section_name">Class Section Name</label>
                                                <input name="section_name" value="{{$data->section_name}}" type="text" class="form-control"  id="class_section" placeholder="Class Section">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="section_name">Class</label>
                                                <select name="class_id" id="" class="vanilla_classsection">
                                                @foreach($classes as $class)
                                                <option value="{{$class->id}}" <?php if($data->class_id==$class->id){ echo "selected";}?>>{{$class->class_name}}</option>

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