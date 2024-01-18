$(document).ready(function(){

    let faqFrom        = $("#faqFrom");
    let title          = $("input[name='title']");
    let answer         = $("textarea[name='answer']");

    $(faqFrom).submit(function(e){

        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Faq's  Question is required");
            return false ;
        }
        if($(answer).val() == ""){
            e.preventDefault();
            toastr['error']("Faq's Answer is required");
            return false ;
        }
        if($(answer).val() != "" && $(answer).val().length > 250){
            e.preventDefault();
            toastr['error']("Faqs' Answer must be less then 250");
            return false ;
        }




    });

    if(action == "edit"){
    title.val(faqs.title);
    answer.val(faqs.answer);

    }


    });
