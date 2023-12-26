$(document).ready(function(){

    let settingForm      = $("#aboutusForm");
    let image            = $("input[name='image']");
    let video            = $("input[name='video']");
    let video_banner     = $("input[name='video_banner']");
    let title            = $("input[name='title']");
    let description      = $("textarea[name='description']");
    let submitButton     = $('#submitButton')
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
                toastr['error']("About Us banner must be less then 5 MB");
                $(submitButton).prop('disabled' , true);
            }
            else{
                $(submitButton).prop('disabled' , false);
            }
        }
    });
    $(video).on('change' , function(e){
        e.preventDefault()
        var file  = this.files[0];
        var fileExtention     = file.name.split('.').pop().toLowerCase();
        var allowedExtenstion = ['mp4', 'webm'];

        if(file){
            var fileSize  = file.size / (1024 * 1024);
            if(allowedExtenstion.indexOf(fileExtention) === -1){
                toastr['error']("Invalid Video Extension supported are mp4 , webm ");
                $(submitButton).prop('disabled' , true);

            }
            if(!allowedExtenstion.indexOf(fileExtention) === -1){
                $(submitButton).prop('disabled' , true);
            }
            if(fileSize > 10){
                toastr['error']("About Us Video must be less then 10 MB");
                $(submitButton).prop('disabled' , true);
            }
            else{
                $(submitButton).prop('disabled' , false);
            }
        }
    });
    $(video_banner).on('change' , function(e){
        e.preventDefault()
        var file  = this.files[0];
        var fileExtention     = file.name.split('.').pop().toLowerCase();
        var allowedExtenstion = ['jpg', 'jpeg', 'png'];
        if(file){
            var fileSize  = file.size / (1024 * 1024);
            if(allowedExtenstion.indexOf(fileExtention) === -1){
                toastr['error']("Invalid Video Banner Extension supported are Jpeg , Png , Jpg");

                $(submitButton).prop('disabled' , true);

            }
            if(!allowedExtenstion.indexOf(fileExtention) === -1){
                $(submitButton).prop('disabled' , true);
            }
            if(fileSize > 5){
                toastr['error']("About Us Video banner must be less then 5 MB");
                $(submitButton).prop('disabled' , true);
            }
            else{
                $(submitButton).prop('disabled' , false);
            }
        }
    });
    $(settingForm).submit(function(e){

       if(action == 'create'){
        if($(image).val() == ""){
            e.preventDefault();
            toastr['error']("Banner Image is required");
            return false ;
        }
        if($(video).val() == ""){
            e.preventDefault();
            toastr['error']("Video is required");
            return false ;
        }
        if($(video_banner).val() == ""){
            e.preventDefault();
            toastr['error']("Video Banner is required");
            return false ;
        }
    }

        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Title is required");
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
    description.val(aboutus.description);


    }


    });
