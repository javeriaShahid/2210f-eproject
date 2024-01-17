$(document).ready(function(){

    let settingForm      = $("#dealsbannersForm");
    let image            = $("input[name='image']");
    let title            = $("input[name='title']");
    let category         = $("select[name='category_id']");
    let percent          = $("input[name='percent_off']");
    let description      = $("textarea[name='short_description']");
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

       if(action == 'create'){
        if($(image).val() == ""){
            e.preventDefault();
            toastr['error']("Banner Image is required");
            return false ;
        }
    }

        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Title is required");
            return false ;
        }
        if($(category).val() == ""){
            e.preventDefault();
            toastr['error']("Category is required");
            return false ;
        }
        if($(percent).val() == "" || $(percent).val() <= 0){
            e.preventDefault();
            toastr['error']("Discount Percent is required and must be greater then 0 ..!");
            return false ;
        }

        if($(description).val().length > 100 && $(description).val() != ""){
            e.preventDefault();
            toastr['warning']("Description must be less then 100");
            return false ;
        }



    });

    if(action == "edit"){
    title.val(deals.title);
    category.val(deals.category_id);
    percent.val(deals.percent_off);
    description.val(deals.short_descriptions);


    }


    });
