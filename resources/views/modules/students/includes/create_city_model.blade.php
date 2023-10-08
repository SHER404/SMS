

<script>
$(document).ready(function() {

    selectBox = new vanillaSelectBox(".vanilla_citycountry", {
        "keepInlineStyles":true,
        "maxHeight": 200,
        "minHeight": 200,
        "minWidth":445,
        "search": true,
        "placeHolder": "Choose..." 

    });

});

</script>



                 <div class="form-group mb-4">
                    <label for="modal_student_country">Choose Country</label>
                    <select id="modal_student_country" class="vanilla_citycountry" required>
                    @foreach($countries as $datas)
                     <option value="{{$datas->id}}">{{$datas->name}}</option>

                     @endforeach
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="modal_student_city" required placeholder="City Name">
                </div>
       
   




       