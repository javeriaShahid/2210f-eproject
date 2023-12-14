$(document).ready(function(){

let MailForm       = $("#mailSettingForm");
let smtp_email     = $("input[name='smtp_email']");
let smtp_server    = $("input[name='smtp_server']");
let smtp_port      = $("input[name='smtp_port']");
let smtp_user      = $("input[name='smtp_user']");
let smtp_password  = $("input[name='smtp_password']");
$(MailForm).submit(function(e){

    if($(smtp_email).val() == ""){
        e.preventDefault();
        toastr['error']("SMTP Mail is required");
        return false ;
    }
    if($(smtp_server).val() == ""){
        e.preventDefault();
        toastr['error']("SMTP Server is required");
        return false ;
    }
    if($(smtp_port).val() == ""){
        e.preventDefault();
        toastr['error']("SMTP Port is required");
        return false ;
    }
    if($(smtp_user).val() == ""){
        e.preventDefault();
        toastr['error']("SMTP User is required");
        return false ;
    }
    if($(smtp_password).val() == ""){
        e.preventDefault();
        toastr['error']("SMTP Password is required");
        return false ;
    }



});

if(action == "edit"){
smtp_email.val(mail_settings.smtp_email);
smtp_server.val(mail_settings.smtp_server);
smtp_port.val(mail_settings.smtp_port);
smtp_user.val(mail_settings.smtp_user);
smtp_password.val(mail_settings.smtp_password);
}

});
