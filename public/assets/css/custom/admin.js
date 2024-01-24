$(document).ready(function(){

    let adminForm        = $("#adminForm");
    let image            = $("input[name='profile_image']");
    let username         = $("input[name='username']");
    let name             = $("input[name='name']");
    let email            = $("input[name='email']");
    let contact_number   = $("input[name='contact_number']");
    let submitButton     = $("#submitButton");
    $(image).on('change' , function(e){
        e.preventDefault()
        var file              = this.files[0];
        var fileExtention     = file.name.split('.').pop().toLowerCase();
        var allowedExtenstion = ['jpg', 'jpeg', 'png'];

        if(file){
            if(allowedExtenstion.indexOf(fileExtention) === -1){
                toastr['error']("Invalid Image Extension supported are Jpeg , Png , Jpg");
                $(submitButton).prop('disabled' , true);

            }
            if(!allowedExtenstion.indexOf(fileExtention) === -1){
                $(submitButton).prop('disabled' , true);
            }
            var fileSize  = file.size / (1024 * 1024);
            if(fileSize > 5){
                toastr['error']("Profile Image must be less then 5 MB");
                $(submitButton).prop('disabled' , true);
            }
            else{
                $(submitButton).prop('disabled' , false);
            }
        }
    });
    $(adminForm).submit(function(e){



        if($(username).val() == ""){
            e.preventDefault();
            toastr['error']("User name is required");
            return false ;
        }
        if($(name).val() == ""){
            e.preventDefault();
            toastr['error']("Full name is required");
            return false ;
        }
        if($(email).val() == ""){
            e.preventDefault();
            toastr['error']("Email is required");
            return false ;
        }
        if ($(email).val() !== "" && !$(email).val().match(/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i)) {
            e.preventDefault();
            toastr['error']("Invalid Email pattern..!");
            return false;
        }
        if($(contact_number).val() == ""){
            e.preventDefault();
            toastr['error']("Contact Number is required");
            return false ;
        }




    });
    });
