$(document).ready(function(){

    let carouselForm   = $("#categoryBannerForm");
    let image          = $("input[name='image']");
    let title_1        = $("input[name='title_1']");
    let title_2        = $("input[name='title_2']");
    let color_1        = $("input[name='color_1']");
    let color_2        = $("input[name='color_2']");

    let category_id  = $("select[name='category_id']");

    $(carouselForm).submit(function(e){

       if(action == 'create'){
        if($(image).val() == ""){
            e.preventDefault();
            toastr['error']("Banner Image is required");
            return false ;
        }
       }
        if($(title_1).val() == ""){
            e.preventDefault();
            toastr['error']("First Banner Title is required");
            return false ;
        }
        if($(title_2).val() == ""){
            e.preventDefault();
            toastr['error']("Second Banner Title is required");
            return false ;
        }
   

        if($(category_id).val() == ""){
            e.preventDefault();
            toastr['error']("Banner Category is required");
            return false ;
        }


    });

    if(action == "edit"){
    title_2.val(categorybanner.title_2);
    title_1.val(categorybanner.title_1);
    color_1.val(categorybanner.color_1);
    color_2.val(categorybanner.color_2);
    category_id.val(categorybanner.category_id);

    }


    });
