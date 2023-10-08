$(document).ready(function() {
    
    //vanilla selectbox
    selectBox = new vanillaSelectBox(".vanilla_student_search", {
        "keepInlineStyles":true,
        "maxHeight": 200,
        "minHeight": 200,
        "minWidth":220,
        "search": true,
        "placeHolder": "Choose..." 
    });
    selectBox2 = new vanillaSelectBox(".vanilla_class_search", {
        "keepInlineStyles":true,
        "maxHeight": 200,
        "minHeight": 200,
        "minWidth":220,
        "search": true,
        "placeHolder": "Choose..." 
    });
    selectBox3 = new vanillaSelectBox(".vanilla_fam", {
        "keepInlineStyles":true,
        "maxHeight": 200,
        "minHeight": 200,
        "minWidth":220,
        "search": true,
        "placeHolder": "Choose..." 
    });

});

