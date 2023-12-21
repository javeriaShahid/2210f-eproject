$(document).ready(function(){

    let paymentsettingsForm   = $("#paymentsettingsForm");
    let image          = $("input[name='image']");
    let title          = $("input[name='name']");
    let type           = $("select[name='getway_type']");
    let api            = $("input[name='api_key']");
    let secret         = $("input[name='secret_key']");
    let C_url          = $("input[name='callback_url']");
    let A_settings     = $("textarea[name='additional_settings']");


    $(paymentsettingsForm).submit(function(e){

       if(action == 'create'){
        if($(image).val() == ""){
            e.preventDefault();
            toastr['error']("Payment Image is required");
            return false ;
        }
       }
        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Payment Title is required");
            return false ;
        }
        if($(type).val() == ""){
            e.preventDefault();
            toastr['error']("Payment type  is required");
            return false ;
        }

        if($(api).val() == ""){
            e.preventDefault();
            toastr['error']("Api Key  is required");
            return false ;
        }
        if($(secret).val() == ""){
            e.preventDefault();
            toastr['error']("Secret Key  is required");
            return false ;
        }
        if($(C_url).val() == ""){
            e.preventDefault();
            toastr['error']("Callback Url  is required");
            return false ;
        }



    });

    if(action == "edit"){
    title.val(payments.name);
    type.val(payments.getway_type);
    api.val(payments.api_key);
    secret.val(payments.secret_key);
    A_settings.val(payments.additional_settings);
    C_url.val(payments.callback_url);

    }


    });
