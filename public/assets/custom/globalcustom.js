function deleteItem(item_id, url){
         $('#item_id_modal').val('');
         $('#url_modal').val('');
         $('#deleteModal').modal('show');
         $('#item_id_modal').val(item_id);
         $('#url_modal').val(url);
      
}
function deleteConfirm(){
   
    var item_id=$('#item_id_modal').val();
    var url=$('#url_modal').val();
    var email=$('#delete_email').val();
    var password=$('#delete_password').val();
     $.ajax({
                url:'delete-confirm',
                type: 'POST',
                data:{
                    email:email,
                    password:password,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
                },
                success: function(response){
                    if(response=='success'){
                        deleteItem2(item_id, url);

                        $('#deleteModal').modal('hide');

                    }else{
                        Swal.fire(
                            'Authentication Error!',
                            'Data Can Not be Deleted.',
                            '!!!!'
                          );
                          $('#deleteModal').modal('hide');
                          $('#item_id_modal').val('');
                          $('#url_modal').val('');
                    }
                   
        
                   
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                    }
                });
    
 
}
function deleteItem2(item_id, url){    
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
           

            $.ajax({
                url:   url+item_id,
                type: 'DELETE',
                
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),   
                },
                success: function(response){
                    //console.log(response);
                    //alert('done');

                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      );
                        
                    $('#item_'+item_id).remove();
                     $('#item_id_modal').val('');
                     $('#url_modal').val('');
        
                   
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                    }
                });
            
          
        }else{
            $('#item_id_modal').val('');
            $('#url_modal').val('');
        }
    });
}

