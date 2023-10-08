@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">
                        
                    <div class="row" style="margin-bottom: 1em">
                            <div class="col-6 text-left"><h3>Employees</h3></div>
                            <div class="col-6 text-end"><a href="employees/create" class="btn btn-primary">Add New</a></div>
                        </div>

                        

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            <br>
                        @endif

                        <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="individual-col-search" class="table dt-table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Employee Name</th>
                                                <th>CNIC</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Post/Job</th>
                                                <th>Salary</th>
                                                <th>Joining Date</th>
                                                
                                                <th class="text-center dt-no-sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $datas)
                                            
                                            <tr id="item_{{$datas->id}}">
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                
                                                <td>
                                                     <div class="media">
                                                         <div class="avatar me-2">
                                                            <?php
                                                              $url='assets/img/profile-11.jpeg';
                                                              if($datas->img!=null){
                                                                $url=$datas->img;
                                                              }
                                                            ?>
                                                             <img alt="avatar" src="<?=$url?>" class="rounded-circle" />
                                                         </div>
                                                         <div class="media-body align-self-center">
                                                             <h6 class="mb-0">{{$datas->employee_name}}</h6>
                                                             <span>{{$datas->user?->email}}</span>
                                                         </div>
                                                     </div>
                                                </td>   
                                                <td>{{$datas->employee_cnic}}</td>   
                                                <td>{{$datas->employee_phone}}</td>      
                                                <td>{{$datas->adress}}</td> 
                                                <td>
                                                <p class="mb-0">Role</p>
                                                        <span class="text-success">{{$datas->employee_job}}</span>
                                               </td>     
                                                <td>{{$datas->employee_salery}}</td>
                                                <td>{{$datas->joining_date}}</td> 

                                                <td class="text-center">
                                                    <div class="action-btns">
                                                        <?php if($datas->user?->email==null){?>
                                                        <form action="create-user" method="post">
                                                           @csrf
                                                            <input type="hidden" name="emp_id" value="{{$datas->id}}" id="">
                                                            <input type="hidden" name="emp_name" value="{{$datas->employee_name}}" id="">
                                                            <input type="hidden" name="emp_type" value="{{$datas->employee_job}}" id="">
                                                            <input type="hidden" name="emp_campus" value="{{$datas->campus_id}}" id="">
                                                           <input type="submit" value="Create User" class="btn btn-warning m-1">
                                                        </form>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!-- <a href="{{route('employees.show',$datas->id)}}" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="View">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                        </a> -->
                                                        <a href="{{route('employees.edit',$datas->id)}}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                        </a>
                                                        <a onclick="deleteItem({{$datas->id}}, 'employees/')" href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Employee Name</th>
                                                <th>CNIC</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Post/Job</th>
                                                <th>Salary</th>
                                                <th>Joining Date</th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>

@endsection            