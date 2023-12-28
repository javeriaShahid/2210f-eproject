$(document).ready(function(){

    let commentForm      = $("#commentForm");
    let subject          = $("input[name='subject']");
    let message          = $("textarea[name='message']");

    $(commentForm).submit(function(e){

        if($(subject).val() == ""){
            e.preventDefault();
            toastr['error']("Subject For comment is required");
            return false ;
        }
        if($(message).val() == ""){
            e.preventDefault();
            toastr['error']("Message For Comment is required");
            return false ;
        }
    });

    });
