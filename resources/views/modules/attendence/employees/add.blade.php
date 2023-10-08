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
                                        <li class="breadcrumb-item"><a href="/classes">Academic Sessions</a></li>
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
                                                <h4>Add Sessions</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form action="{{ route('academic-sessions.store') }}" method="POST">
                                        @csrf 
                                        
                                            <div class="row mb-4">
                                                <!-- <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="starting_month">Start Month</label>
                                                        <input type="month" class="form-control" name="starting_month" id="starting_month" placeholder="Start Month">
                                                    </div>
                                                </div> -->
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="starting_year">Start Year</label>
                                                        <input type="date"  class="form-control" name="starting_year" id="starting_year" placeholder="Start Year">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <!-- <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="ending_month">Ending Month</label>
                                                        <input type="month" class="form-control" name="ending_month" id="ending_month" placeholder="Ending Month">
                                                    </div>
                                                </div> -->
                                                <div class="col">
                                                    <div class="form-group mb-4">
                                                        <label for="ending_year">Ending Year</label>
                                                        <input type="date" class="form-control" name="ending_year" id="ending_year" placeholder="Start Year">
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

@endsection            