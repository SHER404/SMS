<!-- Add Status Modal -->
<div class="modal fade" id="status_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="modal_father_name">Status</label>
                    <select name="status" id="user_model_status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="InActive">InActive</option>
                    </select>
                    <input type="hidden" id="user_model_id">
                    <input type="hidden" id="user_model_type">
                </div>

               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button onclick="changeStatus()" data-bs-dismiss="modal" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- End status Modal -->
