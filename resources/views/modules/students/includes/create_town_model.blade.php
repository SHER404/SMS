

<script>
$(document).ready(function() {

    selectBox = new vanillaSelectBox(".vanilla_country", {
        "keepInlineStyles":true,
        "maxHeight": 200,
        "minHeight": 200,
        "minWidth":445,
        "search": true,
        "placeHolder": "Choose..." 

    });
    selectBox = new vanillaSelectBox(".vanilla_city", {
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
                    <label for="student_towncountry">Choose Country</label>
                    <select id="student_towncountry" class="vanilla_country">
                    @foreach($countries as $datas)
                     <option value="{{$datas->id}}">{{$datas->name}}</option>

                     @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="student_towncity">Choose City</label>
                    <select id="student_towncity" class="vanilla_city">
                    @foreach($cities as $datas)
                     <option value="{{$datas->id}}">{{$datas->name}}</option>

                     @endforeach
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="modal_town_name" required placeholder="Town Name">
                </div>
       
   




       