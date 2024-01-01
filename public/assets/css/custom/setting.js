$(document).ready(function(){

    let settingForm     = $("#settingForm");
    let logo            = $("input[name='logo']");
    let x_icon          = $("input[name='x_icon']");
    let title           = $("input[name='title']");
    let contact         = $("input[name='contact']");
    let email           = $("input[name='email']");
    let address         = $("input[name='address']");
    let map_link        = $("input[name='map_link']");
    let countryLink     = $("input[name='country_city']");
    let iFrame          = $("input[name='i_frame_link']");
    let designed_by     = $("input[name='designed_by']");
    let designed_year   = $("input[name='designed_year']");
    $(settingForm).submit(function(e){

       if(action == 'create'){
        if($(logo).val() == ""){
            e.preventDefault();
            toastr['error']("Website Main Logo is required");
            return false ;
        }
        if($(x_icon).val() == ""){
            e.preventDefault();
            toastr['error']("Website X_icon is required");
            return false ;
        }
       }
        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Website Title is required");
            return false ;
        }
        if($(contact).val() == ""){
            e.preventDefault();
            toastr['error']("Website Contact Number is required");
            return false ;
        }


        if($(email).val() == ""){
            e.preventDefault();
            toastr['error']("Website Email is required");
            return false ;
        }
        if($(address).val() == ""){
            e.preventDefault();
            toastr['error']("Website Contact Address is required");
            return false ;
        }
        if($(map_link).val() == ""){
            e.preventDefault();
            toastr['error']("Website Map Link is required");
            return false ;
        }
        if($(iFrame).val() == ""){
            e.preventDefault();
            toastr['error']("Website Map I-Frame Link is required");
            return false ;
        }
        if($(countryLink).val() == ""){
            e.preventDefault();
            toastr['error']("Website Country With City is required For Example: Karachi , Pakistan");
            return false ;
        }
        if($(designed_by).val() == ""){
            e.preventDefault();
            toastr['error']("Website Designer Name is required");
            return false ;
        }
        if($(designed_year).val() == ""){
            e.preventDefault();
            toastr['error']("Website Designing Year is required");
            return false ;
        }


    });

    if(action == "edit"){
    title.val(setting.title);
    contact.val(setting.contact);
    email.val(setting.email);
    address.val(setting.address);
    countryLink.val(setting.country_city);
    map_link.val(setting.map_link);
    iFrame.val(setting.i_frame_link);
    designed_by.val(setting.designed_by);
    designed_year.val(setting.designed_year);

    }


    });
