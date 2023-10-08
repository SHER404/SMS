

<script>
$(document).ready(function() {

    selectBox = new vanillaSelectBox(".vanilla_fatherscnic", {
        "keepInlineStyles":true,
        "maxHeight": 200,
        "minHeight": 200,
        "minWidth":445,
        "search": true,
        "placeHolder": "Choose..." 

    });

});

</script>



    <label for="fathers_cnic">Choose Father's CNIC's</label>
    <select name="fathers_cnic" class="vanilla_fatherscnic" id="fathers_cnic" multiple>
        @foreach($parents as $datas)
            <option value="{{$datas->id}}">{{$datas->father_name}} ({{$datas->father_cnic}})</option>
        @endforeach
    </select>
    <br><br>
    <label for="family_name">Family Name</label>
    <input class="form-control" id="family_name_m" placeholder="Family Name" name="family_name">
       
   




       