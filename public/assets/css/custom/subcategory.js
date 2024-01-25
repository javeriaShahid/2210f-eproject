$(document).ready(function(){
    let formContainer   = $('#categoryForm');
    let name            = $('.name');
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

    // Adding more Subcategory Inputs
    let subCatContainer  = $('#moreSub');
    let buttonAdding     = $('#plus-button');

    $(buttonAdding).on('click' , function(e){
        e.preventDefault();
        $(subCatContainer).append(`
        <div  class="d-flex mt-3 ">
        <input name="name[]" type="text" class="form-control" placeholder="Enter Category name" aria-describedby="defaultFormControlHelp"/>
        <button style="margin-left:10px;" class="btn btn-danger removeBtn"><div class="bx bx-x"></div></button>
        </div>
        `);
    });
    $(document).on('click' , '.removeBtn' , function(e){
        e.preventDefault()
        $(this).closest('div').remove();
    });
});
