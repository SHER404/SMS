function default_attend(att,a_date,class_id){
  
  $.ajax({
		url: "/update-student-attendence-default",
		type: "POST",
		data: {
			  att: att,
		    a_date: a_date,
			  class_id: class_id,
			
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult);
            if(dataResult){
              location.reload();  
              
            }
            
			
		}
	});

}
function updateAttendence(att,a_date,id,str){
    $.ajax({
		url: "/update-student-attendence",
		type: "POST",
		data: {
			att: att,
		    a_date: a_date,
			id: id,
			
		},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
        },
		cache: false,
		success: function(dataResult){
            console.log(dataResult);
            if(dataResult){
                $("#item_"+str+"_"+id).removeClass();
                $("#select_"+str+"_"+id).removeClass();
               if(att=='P'){
                 $("#item_"+str+"_"+id).addClass('td-bg');
                 $("#select_"+str+"_"+id).addClass('form-control present-bg');
                 
               }else if(att=='A'){
                 $("#item_"+str+"_"+id).addClass('td-bg');
                 $("#select_"+str+"_"+id).addClass('form-control absent-bg');

               }else if(att=='L'){
                 $("#item_"+str+"_"+id).addClass('td-bg');
                 $("#select_"+str+"_"+id).addClass('form-control leave-bg');

               }else if(att=='H'){
                $("#item_"+str+"_"+id).addClass('td-bg');
                $("#select_"+str+"_"+id).addClass('form-control halfday-bg');

              }else{
                 $("#item_"+str+"_"+id).addClass('td-bg');
                 $("#select_"+str+"_"+id).addClass('form-control simple-bg');
          
               }
               $("#total_p_"+id).html(dataResult.total_p);
               $("#total_a_"+id).html(dataResult.total_a);
               $("#total_l_"+id).html(dataResult.total_l);
               $("#total_h_"+id).html(dataResult.total_h);

            }
            
			
		}
	});

      
      
    

 }