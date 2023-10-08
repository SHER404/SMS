<div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">                                
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Campus Details</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="widget-content widget-content-area p-3">
                                    <form action="{{ route('campuses.update', $data->id) }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        <input type="hidden" name="isCrm" value="1" id="">
                                        <div class="form-group mb-4">
                                                <label for="campus_name">Campus Name</label>
                                                <input type="text" class="form-control" value="{{$data->campus_name}}" name="campus_name" id="campus_name" placeholder="Campus Name">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="campus_address">Campus address</label>
                                                <input type="text" class="form-control" name="campus_address" value="{{$data->campus_address}}" id="campus_address" placeholder="Campus address">
                                            </div>
                                            
                                            <div class="form-group mb-4">
                                                <label for="campus_phone">Campus phone</label>
                                                <input type="text" class="form-control" name="campus_phone" value="{{$data->campus_phone}}" id="campus_phone" placeholder="Campus phone">
                                            </div> 
                                            
                                            <div class="form-group mb-4">
                                                <label for="campus_code">Campus Code</label>
                                                <input type="text" class="form-control" name="campus_code" value="{{$data->campus_code}}" id="campus_code" placeholder="Campus code">
                                            </div>
                                                 
                                            <div class="form-group mb-4">
                                                <label for="campus_bank_detail">Campus Bank Detail</label>
                                                <input type="text" class="form-control" name="campus_bank_detail" value=" {{$data->campus_bank_detail}}" id="campus_bank_detail" placeholder="Campus Bank Detail ">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="campus_whattsapp">Campus WhatsApp</label>
                                                <input type="text" class="form-control" name="campus_whattsapp" value=" {{$data->campus_whattsapp}}" id="campus_whattsapp" placeholder="Campus WattsApp">
                                            </div>

                                            
                                             <div class="mb-4">
                                                <label for="active_session">Active Session</label>
                                                <select class="form-control" name="active_session" id="active_session">
                                                    <option value="">Select Session</option>
                                                    @foreach($session as $sessions)
                                                        <option value="{{$sessions->id}}" <?php if($data->active_session==$sessions->id){ echo "selected";}?>>{{$sessions->starting_year}}-{{$sessions->ending_year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="campus_phone">Campus Status</label>
                                                <input type="text" class="form-control" name="campus_status" value=" {{$data->campus_status}}"id="campus_status" placeholder="Campus Status">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="campus_phone">Currency</label>
                                                <input type="text" class="form-control" name="currency" value=" {{$data->currency}}"id="currency" placeholder="currency">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="campus_phone">Currency Symbol</label>
                                                <input type="text" class="form-control" name="currency_symble" value=" {{$data->currency_symble}}"id="currency_symble" placeholder="currency_symble">
                                            </div>
                                            <input type="submit" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--- registration form end ---> 
                        