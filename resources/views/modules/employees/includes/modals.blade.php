<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployee_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="employee_name">Employee Name</label>
                    <input type="text" class="form-control" id="employee_name" placeholder="Employee Name">
                </div>

                <div class="form-group mb-4">
                    <label for="employee_cnic">Employee CNIC</label>
                    <input type="text" class="form-control" id="employee_cnic" placeholder="Employee CNIC">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button data-bs-dismiss="modal" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Employee Modal -->