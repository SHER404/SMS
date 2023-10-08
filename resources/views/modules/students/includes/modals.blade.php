<!-- Add Father Modal -->
<div class="modal fade" id="addFather_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Father</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="modal_father_name">Father Name</label>
                    <input type="text" class="form-control" id="modal_father_name" placeholder="Student's Father Name">
                </div>

                <div class="form-group mb-4">
                    <label for="modal_father_cnic">Father CNIC</label>
                    <input type="text" class="form-control" id="modal_father_cnic" placeholder="Student's Father CNIC">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button onclick="createFather()" data-bs-dismiss="modal" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Father Modal -->






<!-- Add Family Modal -->
<div class="modal fade" id="addFamily_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Family</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="family_modal-body modal-body">
                
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createfamily()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Family Modal -->

<script>

function openmodal(){
    
    //alert('work 1');
    $('.family_modal-body').load('/create_family_model',function(){
       // $('#addFamily_Modal').modal({show:true});

       $('#addFamily_Modal').modal('show');
    });
    
}
function openmodalsection(){
    
   
    $('.section_modal-body').load('/create_section_model',function(){
       
       $('#addClassSection_Modal').modal('show');
    });
}
function openmodalcity(){
    
   
    $('.city_modal-body').load('/create_city_model',function(){
       
       $('#addCity_Modal').modal('show');
    });
}
function openmodaltown(){
    
   
    $('.town_modal-body').load('/create_town_model',function(){
       
       $('#addTown_Modal').modal('show');
    });
}

</script>

<!-- Add Class Modal -->
<div class="modal fade" id="addClass_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="class_name">Class Name</label>
                    <input type="text" class="form-control" id="class_name" placeholder="Class Name (i.e. Class 3)">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createclass()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Class Modal -->


<!-- Add Class Section Modal -->
<div class="modal fade" id="addClassSection_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Class Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="section_modal-body modal-body">
                
                

                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createsection()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Class Section Modal -->


<!-- Refferd by Modal -->
<div class="modal fade" id="addRefferdby_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Refferd</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="refferd_by">Refferd Name</label>
                    <input type="text" class="form-control" id="refferd_by" placeholder="Refferd Name (i.e. Refferd 3)">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createrefferd()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End Refferd by Modal -->

<!-- Campus Modal -->
<div class="modal fade" id="addcampus_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Campus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="campus_name">Campus Name</label>
                    <input type="text" class="form-control" id="campus_name" placeholder="Campus Name (i.e. Campus 3)">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createcampus()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End campus Modal -->

<!-- Religion Modal -->
<div class="modal fade" id="addreligion_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Religion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="religion">Religion Name</label>
                    <input type="text" class="form-control" id="religion" placeholder="Religion Name (i.e. Religion 3)">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createreligion()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End Relegion Modal -->

<!-- family Modal -->
<div class="modal fade" id="addfamily_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Family</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="family_name">Family Name</label>
                    <input type="text" class="form-control" id="family_name" placeholder="family Name (i.e. family 3)">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createfamily()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End family Modal -->

<!-- student status Modal -->
<div class="modal fade" id="addstatus_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="student_status">Student Status</label>
                    <input type="text" class="form-control" id="student_status" placeholder="Student Status Name (i.e. Student Status 3)">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createstudentstatus()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- End student status Modal -->


<!-- Country Modal  -->

<div class="modal fade" id="addCountry_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Country</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group mb-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="modal_country_name" placeholder="Name">
                </div>

                <div class="form-group mb-4">
                    <label for="modal_country_short_name">Short Name</label>
                    <input type="text" class="form-control" id="modal_country_short_name" placeholder="Short Name">
                </div>
                <div class="form-group mb-4">
                    <label for="modal_country_phone_code">Phone Code</label>
                    <input type="text" class="form-control" id="modal_country_phone_code" placeholder="Phone Code">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button onclick="createCountry()" data-bs-dismiss="modal" type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>



 <!-- Country Modal End -->




 <!-- City Modal -->
 
 <div class="modal fade" id="addCity_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create City</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="city_modal-body modal-body">
                
                

                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createcity()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
 <!-- City Modal -->




 <!-- Town  -->
 <div class="modal fade" id="addTown_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Town</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>
            <div class="town_modal-body modal-body">
                
                

                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" onclick="createtown()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>


 <!-- Town -->