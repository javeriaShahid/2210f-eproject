$(document).ready(function(){

    let formContainer      = $('#contactForm');
    let name               = $('input[name="name"]');
    let email              = $("#email");
    let subject            = $('input[name="subject"]');
    let phone              = $('input[name="phone"]');
    let message            = $('textarea[name="message"]');


    $(formContainer).submit(function(e){
        if($(name).val() == "")
        {
            e.preventDefault();
            toastr['error']('Name Field Is Required');
            return false;
        }
        if($(phone).val() == "")
        {
            e.preventDefault();
            toastr['error']('Phone number Field Is Required');
            return false;
        }
        if($(email).val() == "")
        {
            e.preventDefault();
            toastr['error']('Email Field Is Required');
            return false;
        }
        if($(subject).val() == "")
        {
            e.preventDefault();
            toastr['error']('Subject Field Is Required');
            return false;
        }
        if($(message).val() == "")
        {
            e.preventDefault();
            toastr['error']('Message Field Is Required');
            return false;
        }
    });

});
