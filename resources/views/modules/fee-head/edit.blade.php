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
                                        <li class="breadcrumb-item"><a href="/class-sections">Edit Fee</a></li>
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
                                                <h4>Edit Fee</h4>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('fee-head.update', $data->id) }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                            
                                            <div class="form-group mb-4">
                                                <label for="fee_head">Fee Head</label>
                                                <input type="text" class="form-control" value="{{$data->fee_head}}" name="fee_head" id="fee_head" placeholder="Fee Head">
                                            </div>

                                            
                                            <div class="form-group mb-4">
                                                <label for="head_amount">Head Amount</label>
                                                <input type="text" class="form-control" value="{{$data->head_amount}}" name="head_amount" id="head_amount" placeholder="Head Amount">
                                                
                                               </div>

                                               <div class="col">
                                                    <label for="fee_type">Fee Type</label>
                                                    <select id="fee_type" name="fee_type"  class="select2 form-control">
                                                        
                                                        <option <?php if($data->fee_type==='Anual'){ echo 'selected';}?>>Anual</option>
                                                        <option <?php if($data->fee_type==='Quarterly'){ echo 'selected';}?>>Quarterly</option>
                                                        <option <?php if($data->fee_type==='Monthly'){ echo 'selected';}?>>Monthly</option>
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