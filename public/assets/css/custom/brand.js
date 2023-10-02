$(document).ready(function(){
    let formContainer   = $('#brandForm');
    let name            = $('input[name="name"]');
    let image           = $('input[name="image"]');
  
    $(formContainer).submit(function(e){
        if($(name).val() == "")
        {
            e.preventDefault();
            toastr['error']('Name Field Is Required');
          
        }
        if(action == 'create')
        {
          if($(image).val() == "")
          {
             e.preventDefault();
              toastr['error']('Image Field Is Required');
             
          }
        }
    });
    if(action == "edit")
    {
        $(name).val(brand.name);
    }
});