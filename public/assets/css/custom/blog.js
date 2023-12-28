$(document).ready(function(){

    let settingForm      = $("#aboutusForm");
    let image            = $("input[name='image']");
    let title            = $("input[name='title']");
    let tags             = $("#tags");
    let description      = $("textarea[name='description']");
    let blockqoute       = $("#qoute");
    let submitButton     = $('#submitButton');
    $(description).richText();
    $(blockqoute).richText();

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
            toastr['error']("Blog Image is required");
            return false ;
        }
         }

        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Title is required");
            return false ;
        }
        if($(tags).val() == ""){
            e.preventDefault();
            toastr['error']("Atleast 1 Tag is required");
            return false ;
        }





    });

    if(action == "edit"){
    title.val(blog.title);
    description.val(blog.description);
    }
    });
