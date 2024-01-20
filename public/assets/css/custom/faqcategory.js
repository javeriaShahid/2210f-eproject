$(document).ready(function(){

    let faqFrom        = $("#faqscategoriesForm");
    let title          = $("input[name='name']");

    $(faqFrom).submit(function(e){


        if($(title).val() == ""){
            e.preventDefault();
            toastr['error']("Faq's  Category Name is required");
            return false ;
        }

    });

    if(action == "edit"){
    title.val(faqs.name);
    }


    });
