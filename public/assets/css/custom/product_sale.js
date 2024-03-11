$(document).ready(function(){
    let saleForm   = $('#saleForm');
    let price      = $("input[name='price']");
    let startDate  = $("input[name='startDate']");
    let endDate    = $("input[name='endDate']");

    $(saleForm).submit(function(e){
        let isValid = true;


        if($(price).val() == ""){
            e.preventDefault();
            isValid = false;
            toastr['error']("Please provide discounted Price for the product..!");
            return false ;
        }
        if($(startDate).val() == ""){
            e.preventDefault();
            isValid = false;
            toastr['error']("Please provide the starting date of Discount..!");
            return false ;
        }
        if($(endDate).val() == ""){
            e.preventDefault();
            isValid = false;
            toastr['error']("Please provide the ending date of Discount..!");
            return false ;
        }
        if($(startDate).val() >= $(endDate).val() && $(startDate).val() != "" && $(endDate).val() != ""){
            e.preventDefault();
            isValid = false;
            toastr['error']("Ending date of discount cannot be less then or equal to the start date..!");
            return false ;
        }

    })


});
