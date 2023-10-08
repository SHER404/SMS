<div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">                                
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Fee Settings</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="widget-content widget-content-area p-3">
                                    <form action="{{ route('campuses.update', $data->id) }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        <input type="hidden" name="isCrm" value="1" id="">
                                            
                                            <div class="form-group mb-4">
                                                <label for="fee_deadline">Fee Last Date</label>
                                                <input type="number" min="1" max="31" step="1" value="{{$data->fee_deadline}}"  class="form-control" name="fee_deadline" id="fee_deadline">
                                                
                                            </div>
                                            <input type="submit" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--- registration form end ---> 
                        