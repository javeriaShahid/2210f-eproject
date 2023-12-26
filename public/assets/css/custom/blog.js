$(document).ready(function(){

    let settingForm      = $("#aboutusForm");
    let image            = $("input[name='image']");
    let title            = $("input[name='title']");
    let tags             = $("#tags");
    let description      = $("textarea[name='description']");
    let blockqoute       = $("#qoute");
    let submitButton     = $('#submitButton');

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
        console.log(blockqoute.val());
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

        if($(blockqoute).val() == ""){
            e.preventDefault();
            toastr['error']("Blockqoute is required");
            return false ;
        }
        if($(blockqoute).val().length < 100 && $(blockqoute).val().length > 1000 && $(blockqoute).val() != ""){
            e.preventDefault();
            toastr['warning']("Blockqoute must be greater then 100 and less then 1000");
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
    title.val(blog.title);
    description.val(blog.description);
    }
    });
