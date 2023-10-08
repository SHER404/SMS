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
                                        <li class="breadcrumb-item"><a href="/school-visitors">SchoolVisitor</a></li>
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
                                                <h4>Edit SchoolVisitor</h4>
                                            </div>
                                        </div>
                                    </div>
                                       <div class="widget-content widget-content-area">
                                        <form action="{{route('school-visitors.update',$data->id)}}" method="POST">

                                        @csrf 
                                        @method('PUT')
                                        
                                            
                            
                                        <div class="row">
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Visitor Name</label>
                                                   <input type="text" value="{{$data->name}}" class="form-control" name="name" id="name" placeholder=" Name">
                                                  </div>

                                                </div>
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Phone</label>
                                                   <input type="text" value="{{$data->phone}}" class="form-control" name="phone" id="name" placeholder="Phone">
                                                  </div>

                                                </div>
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Address</label>
                                                   <input type="text" value="{{$data->address}}" class="form-control" name="address" id="address" placeholder="Address">
                                                  </div>

                                                </div>
                                                <!-- <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Number Of Students</label>
                                                   <input type="number" value="{{$data->total_students}}" class="form-control" name="total_students" id="address" placeholder="Number Of Students">
                                                  </div>

                                                </div> -->
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Offered Fee</label>
                                                   <input type="text" value="{{$data->offered_fee}}" class="form-control" name="offered_fee" id="address" placeholder="Offered Fee">
                                                  </div>

                                                </div>
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Date</label>
                                                   <input type="date" value="{{$data->visitor_date}}" class="form-control" name="visiting_date" id="address" placeholder="Visitor Date">
                                                  </div>

                                                </div>
                                                <!-- <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Class</label>
                                                    <select name="class_id" class="form-control" id="">
                                                        <option value="">Select Class</option>
                                                        @foreach($classes as $datas)
                                                        <option value="{{$datas->id}}" <?php if($data->class_id==$datas->id){ echo "selected";}?>>{{$datas->class_name}}</option>

                                                        @endforeach
                                                    </select>
                                                  </div>

                                                </div> -->

                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <?php  $status=['Pending','Admission Done', 'Cancelled'];?>
                                                   <label for="name">Status</label>
                                                    <select name="status" class="form-control" id="">
                                                        <option value="">Select Status</option>
                                                        @foreach($status as $datas)
                                                        <option value="{{$datas}}" <?php if($data->status==$datas){ echo "selected";}?>>{{$datas}}</option>

                                                        @endforeach
                                                    </select>
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

 @include('modules.students.includes.modals')

@endsection            