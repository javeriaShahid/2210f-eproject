$(document).ready(function(){

    let carouselForm = $("#carouselsettingForm");
    let image        = $("input[name='image']");
    let title        = $("input[name='main_title']");
    let tag_1        = $("input[name='tag_1']");
    let tag_2        = $("input[name='tag_2']");
    let description  = $("input[name='description']");
    let category_id  = $("select[name='category_id']");

    $(carouselForm).submit(function(e){

       if(action == 'create'){
        if($(image).val() == ""){
            e.preventDefault();
            toastr['error']("Carousel Image is required");
            return false ;
        }
       }
        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Carousel Title is required");
            return false ;
        }
        if($(tag_1).val() == ""){
            e.preventDefault();
            toastr['error']("Carousel Main Tag is required");
            return false ;
        }
        if($(tag_2).val() == ""){
            e.preventDefault();
            toastr['error']("Carousel Short Tag is required");
            return false ;
        }
        if($(description).val() == ""){
            e.preventDefault();
            toastr['error']("Carousel Description is required");
            return false ;
        }
        if($(description).val() != "" && $(description).val().length > 200){
            e.preventDefault();
            toastr['error']("Carousel Description length must be less then 200");
            return false ;
        }
        if($(category_id).val() == ""){
            e.preventDefault();
            toastr['error']("Product Category is required");
            return false ;
        }


    });

    if(action == "edit"){
    title.val(carousel_settings.main_title);
    tag_1.val(carousel_settings.tag_1);
    tag_2.val(carousel_settings.tag_2);
    category_id.val(carousel_settings.category_id);
    $(description).val(carousel_settings.description);
    }


    });
