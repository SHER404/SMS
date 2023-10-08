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
                                        <li class="breadcrumb-item"><a href="/families">Families</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                                <h4>Edit Family</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                    <form action="{{ route('families.update', $data->id) }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        <div class="form-group mb-4">
                                                    <label for="family_name">Family Name</label><br>
                                                    <input id="family_name" value="{{$data->family_name}}" name="family_name" type="text" placeholder="Family Unique Name" class="form-control">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="fathers_ids">Select Father's CNIC's</label><br>
                                                    <select name="fathers_ids[]" value="{{$data->father_cnic}}" id="fathers_ids" class="vanilla_fatherscnic" multiple>
                                                    @foreach($parents as $class)
                                                <option>{{$class->father_name}}</option>

                                                @endforeach
                                                    </select>
                                                </div>
                                            
                                                <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Parent Name</th>
      <th scope="col">Father id</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    
      <td>Ali</td>
      <td>1</td>
      
    </tr>
   
    
  </tbody>
</table>

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