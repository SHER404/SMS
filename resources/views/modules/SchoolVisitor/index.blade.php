@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">
                        <div class="row" style="margin-bottom: 1em">
                            <div class="col-6 text-left"><h3>Visitors</h3></div>
                            <div class="col-6 text-end"><a href="school-visitors/create" class="btn btn-primary">Add New</a></div>
                        </div>
                        <div class="row layout-spacing">
                        <div class="col-lg-12">
                         @if(session()->has('success'))
                         <div class="alert alert-success">
                        {{ session()->get('success') }}
                        </div>
                        <br>
                         @endif
                         <form action="school-visitor" method="POST">
            @csrf
            <div class="row m-2">
               <div class="col-12">
                  <div class="row">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                  <label for="student">Select Class</label>
                  <select name="class" id="class_search" class="vanilla_class_search" >
                     <option value="" >None</option>
                     @foreach($allclasses as $class)
                     <option value="{{$class->id}}" <?php if($class->id==$atc_id){ echo "selected";}?>>{{$class->class_name}}</option>
                     
                     @endforeach
                  </select>
               </div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                
                  <label for="session_search">Select Session</label>
                  <select name="session_id" id="session_search" class="vanilla_session_search" >
                     <option value="" >None</option>
                     @if($allsessions)
                     @foreach($allsessions as $session)
                     <option value="{{$session->id}}" <?php if($session->id==$session_id){ echo "selected";}?>><?php echo date('Y',strtotime($session->starting_year))?>-<?php echo date('Y',strtotime($session->ending_year))?></option>
                     @endforeach
                     @endif
                  </select>
               </div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
               <?php  $statuses=['Pending','Admission Done', 'Cancelled'];?>
                  <label for="status_search">Select Status</label>
                  <select name="status" id="status_search" class="vanilla_status_search" >
                     
                      <option value="">None</option>
                     @foreach($statuses as $datas)
                      <option value="{{$datas}}" <?php if($status==$datas){ echo "selected";}?>>{{$datas}}</option>

                     @endforeach
                  </select>
               </div>
               
               <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                  <label for="month">Date</label>
                  <input type="date" name="v_date"  class="form-control" id="month">
                  
               </div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                  <label for="student_number">By Student Number</label>
                 
                  <input type="number" min="1" max="10"  name="student_number" class="form-control" id="student_number">
                  
               </div>

                  </div>
                  <div class="row">
                  <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                  <label for="button"></label>
                  <input name="button" type="submit" class="form-control mt-3 p-2 btn btn-primary" >
                   </div>

                  </div>
               </div>
              
               
               
            </div>
         </form>
        
                         <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                <table id="individual-col-search" class="table dt-table-hover">
                                <thead>
                                    <tr>
                                     <th class="text-center">ID</th>
                                     <th>Name</th>
                                     <th>Phone</th>
                                     <th>Address</th>
                                     <th>Students</th>
                                     <th>Offered Fee</th>
                                     <th>Student | Class</th>
                                     <th>Date</th>
                                     <th>Status</th>
                                     
                                    <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $datas)
                                            <tr id="item_{{$datas->id}}" class=" <?php if($datas->status=='Admission Done'){ echo 'bg-success';}?>">
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$datas->name}}</td>
                                                <td>{{$datas->phone}}</td>
                                                <td>{{$datas->address}}</td>
                                                <td>
                                                <?php
                                                    $total_s=0;
                                                    if($datas->studentClasses)
                                                    {
                                                        foreach($datas->studentClasses as $c)
                                                        {
                                                            $total_s++;
                                                        }
                                                    }
                                                    echo $total_s;
                                                    ?>
                                                </td>
                                                <td>{{$datas->offered_fee}}</td>
                                                <td>
                                                    <?php
                                                    if($datas->studentClasses)
                                                    {
                                                        foreach($datas->studentClasses as $c)
                                                        {
                                                    ?>
                                                    <div class="media-body align-self-center">
                                                       <h6 class="mb-0">{{$c->student_name}}</h6>
                                                       <span class="badge badge-light-secondary">{{$c->class?->class_name}}</span>
                                                     </div>
                                                    

                                                    <?php
                                                     
                                                    
                                                    }
                                                   }
                                                    ?>
                                                    
                                                </td>
                                                <td>{{$datas->visiting_date}}</td>
                                                <td><button onclick="setStatusModal({{$datas->id}},'{{$datas->status}}')" data-bs-toggle="modal" data-bs-target="#status_Modal" class="btn btn-<?php if($datas->status=='Admission Done'){echo 'primary';}else if($datas->status=='Pending'){echo 'warning';}else{echo 'danger';}?>" id="no-results-btn">{{$datas->status}}</button></td>
                                               
                                                                                       
                                                <td class="text-center">
                                                    <div class="action-btns">
                                                        <a href="{{route('school-visitors.show',$datas->id)}}" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="View">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                        </a>
                                                        <a href="{{route('school-visitors.edit',$datas->id)}}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                        </a>
                                                        <a href="javascript:void(0);"  onclick="deleteItem({{$datas->id}}, 'school-visitors/')" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete">
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
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Students</th>
                                                <th>Offered Fee</th>
                                                <th>Class</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('modules.SchoolVisitor.includes.modals')
                    </div>
                </div>
            </div>

@endsection            