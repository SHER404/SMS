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
                                        <li class="breadcrumb-item"><a href="/class-sections">Edit User</a></li>
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
                                                <h4>Edit User</h4>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('users.update', $data->id) }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                            
                                            <div class="form-group mb-4">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" value="{{$data->name}}" name="name" id="name" placeholder="name">
                                            </div>

                                            
                                            <div class="form-group mb-4">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" value="{{$data->email}}" name="email" id="email" placeholder="email ">
                                                
                                               </div>

                                               <div class="form-group mb-4">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control" value="{{$data->password}}" name="password" id="password" placeholder="Password ">
                                                
                                               </div>

                                               <div class="form-group mb-4">
                                                <div class="col">
                                                    <label for="campus_id">Campus</label>
                                                    <select id="campus_id" name="campus_id" class="select2 form-control">
                                                    @foreach($campuses as $campus)
                                                    <option value="{{$campus->id}}" <?php if($data->campus_id==$campus->id){ echo "selected";}?>>{{$campus->campus_name}}</option>

                                                    @endforeach
                          
                                                    </select>
                                                </div>

                                               <div class="col">
                                                    <label for="user_type"> Type</label>
                                                    <select id="user_type" name="user_type"  class="select2 form-control">
                                                        
                                                        <option <?php if($data->user_type==='Student'){ echo 'selected';}?>>Student</option>
                                                        <option <?php if($data->user_type==='Admin'){ echo 'selected';}?>>Admin</option>
                                                        <option <?php if($data->user_type==='User'){ echo 'selected';}?>>User</option>
                                                    </select>
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