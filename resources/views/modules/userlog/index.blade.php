@extends('layout.layout')

@section('content')

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">

                        <div class="row" style="margin-bottom: 1em">
                            <div class="col-6 text-left"><h3>User Logs</h3></div>
                            <!-- <div class="col-6 text-end"><a href="classes/create" class="btn btn-primary">Add New</a></div> -->
                        </div>
                        
                        <div class="row layout-spacing">
                        <div class="col-lg-12">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            <br>
                        @endif
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="individual-col-search" class="table dt-table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                              
                                                <th>User Name</th>
                                                <th>Action</th>
                                                <th>message</th>
                                                <th>Module_type</th>
                                                <th>Created_at</th>


                                                <!-- <th class="text-center dt-no-sorting">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($histories as $history)
                                           
                                            <tr id="history_{{$history->id}}">
                                            <td class="text-center">{{$loop->iteration}}</td>
                                          
                                            <td>
                                            {{$history->user->name}}
                                            <a href="/users/<?=$history->user_id?> " class="w-icon btn btn-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                            </a>
                                                </td>
                                            <td>{{$history->action}}</td>
                                            <td>{{$history->msg}}</td>
                                           <td>
                                              {{$history->module_type}}
                                            <?php
                                            if($history->action!='Delete'){
                                            ?>
                                               <a href="/<?=$history->module_type?>/<?=$history->module_id?>" class="w-icon btn btn-light"> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                                </a>
                                            
                                            <?php
                                            }
                                            ?>   
                                           </td>
                                            <td>{{$history->created_at}}</td>

                                               
                                            
 
                                            </tr>
                                            
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <th class="text-center">ID</th>
                                              
                                              <th>User Name</th>
                                              <th>Action</th>
                                              <th>message</th>
                                              <th>Module_type</th>
                                              <th>Created_at</th>

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