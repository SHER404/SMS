@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">

                        <div class="middle-content container-xxl p-0">
                            <br><br><br>
                            <!-- BREADCRUMB -->
                            <div class="page-meta">
                                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/school-visitors">SchoolVisitor</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create New</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- /BREADCRUMB -->

                            <!--- registration form start ---> 

                            <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                   @if(session()->has('success'))
                                    <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                    </div>
                                    <br>
                                   @endif
                                    <div class="widget-header">                                
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Add SchoolVisitor</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     
                                        <div class="widget-content widget-content-area">
                                        <form action="{{ route('school-visitors.store') }}" method="POST">
                                            @csrf 
                                            <input type="hidden" name="status" value="Waiting" id="">
                                            <div class="row">
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Visitor Name</label>
                                                   <input type="text" class="form-control" name="name" id="name" placeholder=" Name">
                                                  </div>

                                                </div>
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Phone</label>
                                                   <input type="text" class="form-control" name="phone" id="name" placeholder="Phone">
                                                  </div>

                                                </div>
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Address</label>
                                                   <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                                  </div>

                                                </div>
                                                <!-- <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Number Of Students</label>
                                                   <input type="number" class="form-control" name="total_students" id="address" placeholder="Number Of Students">
                                                  </div>

                                                </div> -->
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Offered Fee</label>
                                                   <input type="text" class="form-control" name="offered_fee" id="address" placeholder="Offered Fee">
                                                  </div>

                                                </div>
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="remarks">Remarks</label>
                                                   <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks">
                                                  </div>

                                                </div>
                                                <div class="col-6">
                                                  <div class="form-group mb-4">
                                                   <label for="name">Date</label>
                                                   <input type="date" class="form-control" name="visiting_date" id="address" placeholder="Visitor Date">
                                                  </div>

                                                </div>
                                                
                                                <div class="col-12">
                                                <div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
                            <tr class="text-success">
                                <th>Student Name</th>
                                <th>Class Name</th>
                                
                                <th></th>
                            </tr>
							<tr>
								<td><input type="text" name="student_name[]" placeholder="Student Name" class="form-control name_list" /></td>
								<td>
                                                    <select name="class_id[]" class="form-control"  >
                                                        <option value="">Select Class</option>
                                                        @foreach($classes as $datas)
                                                        <option value="{{$datas->id}}">{{$datas->class_name}}</option>

                                                        @endforeach
                                                    </select>
                                    
                                </td>
								<td><button type="button" name="add" id="add" class="btn btn-warning">+</button></td>
							</tr>
						</table>
						
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



            <script>
                $(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append(`<tr id="row${i}">

        <td><input type="text" name="student_name[]" placeholder="Student Name" class="form-control name_list" /></td>
								<td>
                                                    <select name="class_id[]" class="form-control"  >
                                                        <option value="">Select Class</option>
                                                        @foreach($classes as $datas)
<option value="{{$datas->id}}">{{$datas->class_name}}</option>@endforeach</select></td><td><button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove">X</button></td></tr>`);
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
});
            </script>
@endsection            