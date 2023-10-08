@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                <div class="row layout-top-spacing">
                       @if (\Session::has('error'))
                            <div class="alert alert-danger">
                          <ul>
                          <li>{!! \Session::get('error') !!}</li>
                          </ul>
                          </div>
                        @endif
                      </div>
            

                    <div class="row layout-top-spacing">
                        <div class="row" style="margin-bottom: 1em">
                            <div class="col-6 text-left"><h3>Students</h3></div>
                            <div class="col-6 text-end"><a href="students/create" class="btn btn-primary">Add New</a></div>
                        </div>
                        
                        <div class="row layout-spacing">
                        <div class="col-lg-12">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            <br>
                        @endif
                        <form action="student" method="POST">
                         @csrf
                           <div class="row">
                              <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                                  <label for="student">Class</label>
                                 <select name="class_id" onchange="getSections(this.value)"  id="class_search_id" class="form-control" >
                                   <option value="" >Choose One..</option>
                                   @foreach($classes as $class)
                                   <option value="{{$class->id}}" <?php if($class_id==$class->id){ echo "selected";}?>>{{$class->class_name}}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 m-2">
                                <label for="section_id">Class Section </label>
                                <select id="section_id" name="section_id" class="section_select2 form-control" >
                                <option value="">Choose One..</option>
                                                        
                                </select>
                               </div>
                              
                             <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <label for="button"></label>
                                <input name="button" type="submit" class="form-control mt-3 p-2 btn btn-primary" >
                  

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
                                                <th class="text-center">Reg ID</th>
                                                <th>Name</th>
                                                <th>Class/Section</th>
                                                <th>Gender</th>
                                                <th>View Fees</th>
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
                                                              $url='assets/img/profile-4.jpeg';
                                                              if($datas->img!=null){
                                                                $url=$datas->img;
                                                              }
                                                            ?>
                                                             <img alt="avatar" src="<?=$url?>" class="rounded-circle" />
                                                         </div>
                                                         <div class="media-body align-self-center">
                                                             <h6 class="mb-0">{{$datas->student_name}}</h6>
                                                             <span>{{$datas->father?->father_name}}</span>
                                                         </div>
                                                     </div>
                                                </td>   
                                                <td>
                                                <p class="mb-0">{{$datas->class?->class_name}}</p>
                                                        <span class="text-success">{{$datas->classSection?->section_name}}</span>
                                               </td> 
                                                <td>{{$datas->gender}}</td>
                                                <td><a href="{{route('fee-management.show',$datas->id)}}" class="btn btn-primary">View</a></div></td>
                                                <td class="text-center">
                                                    <div class="action-btns">
                                                        <!-- <a href="{{route('students.show',$datas->id)}}" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="View">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                        </a> -->
                                                        <a href="{{route('students.edit',$datas->id)}}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                        </a>
                                                        <a  onclick="deleteItem({{$datas->id}}, 'students/')"  class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </a>
                                                    </div>
                                                </td>  
</tr>
@endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">Reg ID</th>
                                                <th>Name</th>
                                                <th>Class/Section</th>
                                                <th>Gender</th>
                                                
                                                <th>View Fees</th>
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
   <script>
    $(document).ready(function() {
        $id=$("#class_search_id").val();
        getSections($id);
    });
   </script>
@endsection            