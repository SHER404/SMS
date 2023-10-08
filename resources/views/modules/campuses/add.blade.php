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
                                        <li class="breadcrumb-item"><a href="/campuses">Campuses</a></li>
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
                                                <h4>Add Campus</h4>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('campuses.store') }}" method="POST">
                                        @csrf 
                                            
                                            <div class="form-group mb-4">
                                                <label for="campus_name">Campus Name <span class="text-danger"><strong>*</strong></span></label>
                                                <input type="text" class="form-control" required name="campus_name" id="campus_name" placeholder="Campus Name">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="campus_address">Campus address</label>
                                                <input type="text" class="form-control" name="campus_address" id="campus_address" placeholder="Campus address">
                                            </div>
                                            
                                            <div class="form-group mb-4">
                                                <label for="campus_phone">Campus phone</label>
                                                <input type="text" class="form-control" name="campus_phone" id="campus_phone" placeholder="Campus phone">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="campus_code">Campus Code <span class="text-danger"><strong>*</strong></span></label>
                                                <input type="text" class="form-control" name="campus_code" required id="campus_code" placeholder="Campus code">
                                            </div>
                                                 
                                            <div class="form-group mb-4">
                                                <label for="campus_bank_detail">Campus Bank Detail</label>
                                                <input type="text" class="form-control" name="campus_bank_detail" id="campus_bank_detail" placeholder="Campus Bank Detail ">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="campus_whattsapp">Campus WattsApp</label>
                                                <input type="text" class="form-control" name="campus_whattsapp" id="campus_whattsapp" placeholder="Campus WattsApp">
                                            </div>

                                             <!-- <div class="mb-4">
                                                <label for="active_session">Active Session</label>
                                                <select class="form-control" name="active_session" id="active_session">
                                                    <option value="">Select Session</option>
                                                    @foreach($session as $sessions)
                                                        <option value="{{$sessions->id}}">{{$sessions->starting_year}}-{{$sessions->ending_year}}</option>
                                                    @endforeach
                                                </select>
                                            </div> -->
                                               <input type="hidden" name="active_session" value="1" id="">
                                           


                                            <div class="form-group mb-4">
                                                <label for="campus_phone">Campus Status</label>
                                                <input type="text" class="form-control" name="campus_status" id="campus_status" placeholder="Campus Status">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="campus_phone">Currency</label>
                                                <input type="text" class="form-control" name="currency" id="currency" placeholder="currency">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="campus_phone">Currency Symble</label>
                                                <input type="text" class="form-control" name="currency_symble" id="currency_symble" placeholder="Currency Symble">
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