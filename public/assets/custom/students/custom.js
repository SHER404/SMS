$(document).ready(function() {

    //vanila selectbox 
    /*
    selectBox = new vanillaSelectBox(".vanilla_fatherscnic", {
        "keepInlineStyles":true,
        "maxHeight": 200,
        "minHeight": 200,
        "minWidth":445,
        "search": true,
        "placeHolder": "Choose..." 

    }); */
 
    // selectBox2 = new vanillaSelectBox(".vanilla_class", {
    //     "keepInlineStyles":true,
    //     "maxHeight": 200,
    //     "minHeight": 200,
    //     "minWidth":445,
    //     "search": true,
    //     "placeHolder": "Choose..." 
    // });

    selectBox2 = new vanillaSelectBox(".vanilla_class_search", {
        "keepInlineStyles":true,
        "maxHeight": 200,
        "minHeight": 200,
        "minWidth":200,
        "search": true,
        "placeHolder": "Choose..." 
    });

    //ending vanila selectbox


    $('.select2').select2({
        
    });
   

    //father select2 

    $('.father_select2').select2({
        
        language: {
        noResults: function() {
            return '<button data-bs-toggle="modal" data-bs-target="#addFather_Modal" class="btn btn-warning" id="no-results-btn">No Result Found. Create New Father</button>';
        },
        },
        escapeMarkup: function(markup) {
        return markup;
        },
        
    });

    //ending father select2

    //family select2 

    $('.family_select2').select2({
        
        language: {
        noResults: function() {
            return '<button onclick="openmodal()" type="button" class="openBtn btn btn-warning" id="no-results-btn">No Result Found. Create New Family</button>';
        },
        },
        escapeMarkup: function(markup) {
        return markup;
        },
        
    });

    //ending family select2

    //class select2 

    $('.class_select2').select2({
        
        language: {
        noResults: function() {
            return '<button data-bs-toggle="modal" data-bs-target="#addClass_Modal" class="btn btn-warning" id="no-results-btn">No Result Found. Create New Class</button>';
        },
        },
        escapeMarkup: function(markup) {
        return markup;
        },
        
    });

    //ending class select2

    //class section select2 

    $('.section_select2').select2({
        
        language: {
        noResults: function() {
            return '<button data-bs-toggle="modal" onclick="openmodalsection()" data-bs-target="#addClassSection_Modal" class="btn btn-warning" id="no-results-btn">No Result Found. Create New Section</button>';
        },
        },
        escapeMarkup: function(markup) {
        return markup;
        },
        
    });

    //ending class section select2

    // repeaters 

    $("#resphone_repeater").createRepeater(); 
    $("#emerphone_repeater").createRepeater(); 
    $("#spoken_repeater").createRepeater(); 
    $("#familymembers_repeater").createRepeater(); 
    $("#healthissue_repeater").createRepeater();


    // repeaters ending 

    //fetching fathers 

    $.ajax({
		url: "/fetchparents",
		type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
			
            dataResult.data.forEach(data => {

                options = `<option value="${data.id}">${data.father_name} (${data.father_cnic})</option>`;
                //$('.vanilla_fatherscnic').append(options);

              
               
            })
			
		}
	});

    //ending fetching fathers

});

//Create Father

function createFather(){
    
    var father_name = $('#modal_father_name').val();
    var father_cnic = $('#modal_father_cnic').val();

    


    $.ajax({
		url: "/new-parent",
		type: "POST",
		data: {
			father_name: father_name,
			father_cnic: father_cnic
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data.id);
			var option = `<option value="${dataResult.data.id}" selected>${father_name}</option>`;
            $('#father_name').append(option);
            $('.vanilla_fatherscnic').append(option);

            Swal.fire({
                icon: 'success',
                title: 'Father Created',
            })
			
		}
	});


}
function createCountry(){
    
    var name = $('#modal_country_name').val();
    var shortname = $('#modal_country_short_name').val();
    var phonecode = $('#modal_country_phone_code').val();

    $.ajax({
		url: "/new-country",
		type: "POST",
		data: {
			name: name,
			shortname: shortname,
			phonecode: phonecode
			
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data.id);
			var option = `<option value="${dataResult.data.id}" selected>${dataResult.data.name}</option>`;
            $('#nationality').append(option);
            
            Swal.fire({
                icon: 'success',
                title: 'Country Created',
            })
			
		}
	});


}
function createcity(){
    
    var country_id = $('#modal_student_country').val();
    var name = $('#modal_student_city').val();
   

    $.ajax({
		url: "/new-city",
		type: "POST",
		data: {
			name: name,
			country_id: country_id
			
			
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data.id);
			var option = `<option value="${dataResult.data.id}" selected>${dataResult.data.name}</option>`;
            $('#city').append(option);
            
            Swal.fire({
                icon: 'success',
                title: 'City Created',
            })
			
		}
	});


}
function createtown(){
    
    var country_id = $('#student_towncountry').val();
    var city_id = $('#student_towncity').val();
    var name = $('#modal_town_name').val();
   

    $.ajax({
		url: "/new-town",
		type: "POST",
		data: {
			name: name,
			country_id: country_id,
			city_id: city_id
			
			
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data.id);
			var option = `<option value="${dataResult.data.id}" selected>${dataResult.data.name}</option>`;
            $('#town').append(option);
            
            Swal.fire({
                icon: 'success',
                title: 'Town Created',
            })
			
		}
	});


}
function getSections(id){
    var option = `<option value="">Choose one.....</option>`;
    $('#section_id').html(option);

    $.ajax({
		url: "/getClassSections",
		type: "POST",
		data: {
			
			class_id: id,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data[0].id);
            
            dataResult.data.forEach(element => {
                var option = `<option value="${element.id}">${element.section_name}</option>`;
                $('#section_id').append(option);
              }); 
           
			
		}
        
    
    }); 

}
function getSectionsEdit(id,sec){
    var option = `<option value="">Choose one.....</option>`;
    $('#section_id').html(option);

    $.ajax({
		url: "/getClassSections",
		type: "POST",
		data: {
			
			class_id: id,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data[0].id);
            
            dataResult.data.forEach(element => {
                if(element.id==sec){
                    var option = `<option value="${element.id}" selected>${element.section_name}</option>`;
                }else{
                    var option = `<option value="${element.id}" >${element.section_name}</option>`;
                }
                
                $('#section_id').append(option);
              }); 
           
			
		}
        
    
    }); 

}
function getCities(id){
    var option = `<option value="">Choose one.....</option>`;
    $('#city').html(option);

    $.ajax({
		url: "/get-cities",
		type: "POST",
		data: {
			country_id: id,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data[0].id);
            
            dataResult.data.forEach(element => {
                var option = `<option value="${element.id}">${element.name}</option>`;
                $('#city').append(option);
              }); 
           
			
		}
        
    
    }); 

}
function getTowns(id){
    var option = `<option value="">Choose one.....</option>`;
    var country_id=$('#nationality').val();
    $('#town').html(option);

    $.ajax({
		url: "/getTowns",
		type: "POST",
		data: {
			
			country_id: country_id,
			city_id: id
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data[0].id);
            
            dataResult.data.forEach(element => {
                var option = `<option value="${element.id}">${element.name}</option>`;
                $('#town').append(option);
              }); 
           
			
		}
        
    
    }); 

}
//Ending Create Father


//Create class 

function createclass(){
    
    
    var class_name = $('#class_name').val();

    


    $.ajax({
		url: "/new-class",
		type: "POST",
		data: {
			
			class_name: class_name,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data.id);
            var option = `<option value="${dataResult.data.id}" selected>${class_name}</option>`;
            $('#class_name').append(option);
            $('#class_id').append(option);
			
            Swal.fire({
                icon: 'success',
                title: 'Class Created',
            })
			
		}
        
    
    }); 

    


}

//Ending Create class 



//Create class Section

function createsection(){
    
    var section_name = $('#section_name').val();
    var class_id = $('#class_id').val();

    


    $.ajax({
		url: "/new-class-section",
		type: "POST",
		data: {
			section_name: section_name,
			class_id: class_id
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult.data.id);
            var option = `<option value="${dataResult.data.id}" selected>${section_name}</option>`;
             $('#section_id').append(option);
             
			
            Swal.fire({
                icon: 'success',
                title: 'Section Created',
            })
			
		}
	});


}

//Ending Create class section

//Create Refferd

function createrefferd(){
    
    
    var reffered_by = $('#reffered_by').val();

    var option = `<option selected>${reffered_by}</option>`;
    $('#reffered_by').append(option);


    $.ajax({
		url: "/students",
		type: "POST",
		data: {
			
			reffered_by: reffered_by,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
			
            Swal.fire({
                icon: 'success',
                title: 'Reffered Created',
            })
			
		}
	});


}

//Ending Refferd 

//Create Campus

function createcampus(){
    
    
    var campus_name = $('#campus_name').val();

    var option = `<option selected>${campus_name}</option>`;
    $('#campus_name').append(option);


    $.ajax({
		url: "/students",
		type: "POST",
		data: {
			
			campus_name: campus_name,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
			
            Swal.fire({
                icon: 'success',
                title: 'Campus Created',
            })
			
		}
	});


}

//Ending Campus

//Create Religion

function createreligion(){
    
    
    var religion = $('#religion').val();

    var option = `<option selected>${religion}</option>`;
    $('#religion').append(option);


    $.ajax({
		url: "/students",
		type: "POST",
		data: {
			
			religion: religion,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
			
            Swal.fire({
                icon: 'success',
                title: 'Religion Created',
            })
			
		}
	});


}

//Ending Religion


//Create Religion

function createfamily(){
    
    //var fathers_cnic = [];     
    var family_name = $('#family_name_m').val();
    var fathers_cnic = $('#fathers_cnic').val();
    
    

    $.ajax({
		url: "/new-family",
		type: "POST",
		data: {
			
			family_name: family_name,
			fathers_cnic: fathers_cnic,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){

            console.log(dataResult);

            var option = `<option value="${dataResult.data.custom_id}" selected>${family_name}</option>`;
            $('#family_id').append(option);
            //$('.vanilla_fatherscnic').append(option);

			
            Swal.fire({
                icon: 'success',
                title: 'Family Created',
            })
			
		}
	});


}

//Ending family

//Create status

function createstudentstatus(){
    
    
    var religion = $('#student_status').val();

    var option = `<option selected>${student_status}</option>`;
    $('#student_status').append(option);


    $.ajax({
		url: "/students",
		type: "POST",
		data: {
			
			student_status: student_status,
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
			
            Swal.fire({
                icon: 'success',
                title: 'Student Status Created',
            })
			
		}
	});


}

//Ending status

