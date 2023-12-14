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

    // if(action == "edit"){
    // smtp_email.val(mail_settings.smtp_email);
    // smtp_server.val(mail_settings.smtp_server);
    // smtp_port.val(mail_settings.smtp_port);
    // smtp_user.val(mail_settings.smtp_user);
    // smtp_password.val(mail_settings.smtp_password);
    // }


    });
