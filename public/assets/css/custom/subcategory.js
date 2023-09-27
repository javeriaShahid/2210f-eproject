$(document).ready(function(){
    let formContainer   = $('#categoryForm');
    let name            = $('input[name="name"]');
    let category        = $('select[name="category"]');

    $(formContainer).submit(function(e){
        if($(name).val() == "")
        {
            e.preventDefault();
            toastr['error']('Name Field Is Required');
            return false;
        }
        if($(category).val() == "")
        {
            e.preventDefault();
            toastr['error']('Category Field Is Required');
            return false;
        }
    });
    if(action == "edit")
    {
        $(name).val(subcategory.name);
        $(category).val(subcategory.category.id);
    }
});