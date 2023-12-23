$(document).ready(function(){

    let settingForm      = $("#aboutusForm");
    let image            = $("input[name='image']");
    let short_title      = $("input[name='short_title']");
    let title            = $("input[name='title']");
    let category         = $("select[name='category']");
    let sideOfImage      = $("select[name='side']");
    let description      = $("textarea[name='description']");

    $(settingForm).submit(function(e){

       if(action == 'create'){
        if($(image).val() == ""){
            e.preventDefault();
            toastr['error']("About us Image is required");
            return false ;
        }
    }
        if($(short_title).val() == ""){
            e.preventDefault();
            toastr['error']("Short Title is required");
            return false ;
        }
        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Title is required");
            return false ;
        }
        if($(category).val() == ""){
            e.preventDefault();
            toastr['error']("Product Category is required");
            return false ;
        }


        if($(sideOfImage).val() == ""){
            e.preventDefault();
            toastr['error']("Image Side is required");
            return false ;
        }
        if($(description).val() == ""){
            e.preventDefault();
            toastr['error']("Description is required");
            return false ;
        }
        if($(description).val().length < 100 && $(description).val().length > 1000 && $(description).val() != ""){
            e.preventDefault();
            toastr['warning']("Description must be greater then 100 and less then 1000");
            return false ;
        }



    });

    if(action == "edit"){
    title.val(aboutus.title);
    short_title.val(aboutus.short_title);
    category.val(aboutus.category);
    sideOfImage.val(aboutus.side);
    description.val(aboutus.description);


    }


    });
