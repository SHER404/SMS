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
                                        <li class="breadcrumb-item"><a href="/fee-management">Student Fee</a></li>
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
                                                <h4>Add Student Fee</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('fee-management.store') }}" method="POST">  
                                            @csrf
                                            <input type="hidden" name="student_id" value="{{$studentId}}" id="">
                                              <div class="row mb-4"><!---head row start --->
                                               @foreach($fee_heads as $datas)
                                                <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" onclick="newHead({{$datas->id}},'{{$datas->fee_head}}',{{$datas->head_amount}})" id="fee_{{$datas->id}}" value="" >
                                                    <label class="form-check-label" for="fee_{{$datas->id}}">
                                                    {{$datas->fee_head}}
                                                    </label>
                                                </div>
                                               </div>
                                                @endforeach
                                            
                                                    
                                        </div><!--- heads row ending --->

                                            <!--- heads table start --> 
                                        
                                            <div class="table-responsive mt-4 mb-4">
                                                <table id="fee_heads_table" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="" scope="col">Head Name</th>
                                                            <th scope="col">Default Fee</th>
                                                            <th scope="col">Fee</th>
                                                        </tr>
                                                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                                    </thead>
                                                    <tbody >
                                                    
                                                    
                                                    
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--- heads table end -->

                                            <!--- Total Fee Boxes --->
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="card bg-secondary">
                                                        <div class="card-body">
                                                            <p class="mb-0">Actual Total Fee</p>
                                                            <h3 class="card-title mb-0" name="amount" id="total_price">0.00 PKR</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card bg-success">
                                                        <div class="card-body">
                                                            <p class="mb-0">Discounted Fee</p>
                                                            <h3 class="card-title mb-0" name="fee_discount" id="total_discount">0.00 PKR</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--- Ending Total Fee Boxes --->
                                        

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