$(document).ready(function(){
    let formContainer   = $('#categoryForm');
    let name            = $('input[name="name"]');


    $(formContainer).submit(function(e){
        if($(name).val() == "")
        {
            e.preventDefault();
            toastr['error']('Name Field Is Required');
            return false;
        }
    });
    if(action == "edit")
    {
        $(name).val(category.name);
    }
});