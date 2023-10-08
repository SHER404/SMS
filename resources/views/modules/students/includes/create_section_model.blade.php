

<script>
$(document).ready(function() {

    selectBox = new vanillaSelectBox(".vanilla_class", {
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
                    <label for="student_class">Choose Class</label>
                    <select id="student_class" class="vanilla_class">
                    @foreach($classes as $datas)
                     <option value="{{$datas->id}}">{{$datas->class_name}}</option>

                     @endforeach
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="section_name">Section Name</label>
                    <input type="text" class="form-control" id="section_name" placeholder="Class Section Name">
                </div>
       
   




       