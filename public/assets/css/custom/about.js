$(document).ready(function(){

    let settingForm      = $("#aboutusForm");
    let image            = $("input[name='image']");
    let short_title      = $("input[name='short_title']");
    let title            = $("input[name='title']");
    let category         = $("select[name='category']");
    let sideOfImage      = $("select[name='side']");
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
