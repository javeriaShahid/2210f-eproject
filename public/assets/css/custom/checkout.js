$(document).ready(function(){
// Input Variables
let address1                  = $('input[name="addressline1"]');
let phone1                    = $('input[name="phonenumber1"]');
let country                   = $('select[name="country"]');
let city                      = $('select[name="city"]');
let state                     = $('select[name="state"]');
let postal                    = $('#address_postal');
let email                     = $('input[name="email_address"]');
// End of Variables
let createButton              =  $('#createAdButton');
let createFormContainer       =  $("#createAddressContainer");
let createForm                =  $('#createAddressForm');

let searchContainer           =  $('.search-container') ;
let searchButton              =  $("#searchBtn");
let searchForm                =  $("#searchAddress");
let addAddressButton          =  $("#createAddressButton");
// Table Variables
let tableContainer   = $('#table-container');
let tableBody        = $('#tableData');

// Checkout Form Fields
let name                      = $('input[name="name"]');
let email_address             = $('#EmailAddress');
let streetAddress1            = $('input[name="streetaddress1"]');
let streetAddress2            = $('input[name="streetaddress2"]');
let contactNumber1            = $('input[name="contactNumber1"]');
let contactNumber2            = $('input[name="contactNumber2"]');
let postalCode                = $('#mainPostal');
let paymentMethod             = $('select[name="payment_method"]');
// Forms
$(createButton).on('click' , function(e){
    if($(this).text() == "Create")
    {
        e.preventDefault();
        $(searchContainer).hide();
        $(tableContainer).hide();
        $(createFormContainer).show();
        $(createButton).text("Find");
        $(addAddressButton).show();
    }
    else
    {
        e.preventDefault();
        $(searchContainer).show();
        $(createFormContainer).hide();
        $(createButton).text("Create");
        $(addAddressButton).hide();

    }
});
$('.closeAddress').on('click' , function(e){
    e.preventDefault();
    $(searchContainer).show();
    $(createFormContainer).hide();
    $(tableContainer).hide();
    $(createButton).text("Create");
});
$(addAddressButton).on('click' , function(e){
    e.preventDefault();
    isValid  = true ;
    if(address1.val() == "")
    {
        e.preventDefault();
        toastr['error']("Address Line 1 is required ");
        isValid = false;
    }
    if(phone1.val() == "")
    {
        e.preventDefault();
        isValid = false;
        toastr['error']("Phone Number 1 is required ");
    }
    if(country.val() == "")
    {
        e.preventDefault();
        isValid = false;
        toastr['error']("Country is required ");
    }
    if(state.val() == "")
    {
        e.preventDefault();
        isValid = false;
        toastr['error']("State is required ");
    }

    if(postal.val() == "")
    {
        e.preventDefault();
        isValid = false;
        toastr['error']("Postal Code is required ");
    }
    if(isValid == true)
    {   e.preventDefault();
        $.ajax({
            url : addAddressRoute ,
            type : 'Post' ,
            data : createForm.serialize(),
            success:function(response)
            {
                    if(response.message == "success")
                    {
                        toastr['success']('Address has been added');
                        $(createFormContainer).hide();
                        $(createForm)[0].reset();
                        $(tableContainer).show();
                        $(addAddressButton).hide();
                        $(createButton).text("Create");
                        tableData  = "" ;
                        $(response.address).each(function(index , value){

                            tableData +=`
                            <tr>
                            <td>
                                ${value.id}
                            </td>
                            <td>
                            ${value.addressline1}
                           </td>
                            <td>
                              ${value.countries.name}
                            </td>
                            <td class="d-flex">
                                <input type="hidden" name="addressId" value="${value.id}">
                                <button class="btn plusButton text-white btn-warning"><i class="fa fa-plus"></i></button> |
                                <a href="${accountRoute}" class="btn btn-success editButton"><i class="fa fa-pencil"></i></a> |
                                <button class="btn btn-danger removeButton"><i class="fa fa-trash"></i></button>
                            </td>

                        </tr>`
                        });
                        $(tableBody).html(tableData);
                    }
                    else
                    {
                        toatr['error']('Failed to Add Address');
                    }
            }
         })
    }
});

// Getting City and State

$(country).on('change' , function(e){
    e.preventDefault();
    let id   = $(this).val();

    $.ajax({
        url: FindState +'/' + id ,
        type:"Get" ,
        success:function(response){
           let  statesData = '<option value="">Select State</option>';
            $.each(response , function(index , value){
                statesData += `
                <option value="${value.id}">${value.name}</option>
                `;
            });
            $(state).html(statesData);
        }
    })

});
$(state).on('change' , function(e){
    e.preventDefault();
    let id  = $(this).val();
    $.ajax({
        url: FindCity +'/' + id ,
        type:"Get" ,
        success:function(response){
           let  CityData = '<option value="">Select City</option>';
            $.each(response , function(index , value){
                CityData += `
                <option value="${value.id}">${value.name}</option>
                `;
            });
            $(city).html(CityData);
        }
    });
}); // City code ends here

// Finding Address Using Email Address

$(searchButton).on('click' , function(e){
    e.preventDefault();
    isValid = true ;
    if(email.val() == "")
    {
        isValid = false ;
        toastr['error']("Please Provide Your Email Address");
    }
    if(isValid == true)
    {
        $(searchButton).show();
        e.preventDefault();
        $.ajax({
            url : getAddress,
            type : "post" ,
            data : searchForm.serialize(),
            success:function(response){
                $(searchContainer).hide();
                $(tableContainer).show();
                tableData  = "" ;
                $(response).each(function(index , value){
                    tableData +=`
                    <tr>
                    <td>
                        ${value.id}
                    </td>
                    <td>
                        ${value.addressline1}
                    </td>
                    <td>
                      ${value.countries.name}
                    </td>
                    <td class="d-flex">
                        <input type="hidden" name="addressId" value="${value.id}">
                        <button class="btn plusButton text-white btn-warning"><i class="fa fa-plus"></i></button> |
                        <a href="${accountRoute}" class="btn btn-success editButton"><i class="fa fa-pencil"></i></a> |
                        <button class="btn btn-danger removeButton"><i class="fa fa-trash"></i></button>
                    </td>

                </tr>`
                });
                $(tableBody).html(tableData);
            }
        });
    }
});

$(document).on('click' , '.removeButton' , function(e){
    e.preventDefault();
    let tr = $(this).closest('tr');
    id  = $(this).siblings('input[name="addressId"]').val();
    $.ajax({
        url : deleteAddress + '/' + id ,
        type : "get" ,
        success:function(response){
            if(response.message == 'success')
            {
                tr.remove();
                toastr['success']("Address has been deleted");
                return false ;
            }
            if(response.message == 'delete')
            {
                toastr['error']("You have Orders placed with this Address cancel them or remove them to delete the address");
                return false ;
            }
            else
            {
                toastr['error']("Failed to delete address");
                return false ;
            }
        }
    })
});
// Getting Specific Records
$(document).on('click' , '.plusButton' , function(e){
    e.preventDefault();
    id  = $(this).siblings('input[name="addressId"]').val();
    $.ajax({
        url : specificAddress + '/' + id ,
        type : "get" ,
        success:function(response){
            if(response.message == 'success')
            {
                toastr['success']("Address has been Added");
                $(streetAddress1).val(response.address.addressline1);
                $(streetAddress2).val(response.address.addressline2);
                $(state).html(`<option value="${response.address.state.id}">${response.address.state.name}</option>`);
                $(city).html(`<option value="${response.address.city.id}">${response.address.city.name}</option>`);
                $(country).val(response.address.countries.id);
                $(contactNumber1).val(response.address.phone_number1);
                $(contactNumber2).val(response.address.phone_number2);
                $(postalCode).val(response.address.postalcode);
                $('input[name="address_id"]').val(response.address.id);
            }
            else
            {
                toastr['error']("Failed to add address");
            }
        }
    })
});

// Checkout Form Validation
let checkoutButton     = $('#checkoutBtn');
let checkout_country   = $('#checkout_country');
let checkout_state     = $('#checkout_state');
let checkout_city      = $('#checkoutBtn');
$(checkoutButton).on('click'  , function(e){
    if(name.val() == "")
    {
        e.preventDefault();
        toastr['error']("Name Field Is Required");
    }
    if(email_address.val() == "")
    {
        e.preventDefault();
        toastr['error']("Email Field Is Required");
    }
    if(checkout_country.val() == "")
    {
        e.preventDefault();
        toastr['error']("Country Field Is Required");
    }
    if(checkout_state.val() == "")
    {
        e.preventDefault();
        toastr['error']("State Field Is Required");
    }
    if(streetAddress1.val() == "")
    {
        e.preventDefault();
        toastr['error']("Street Line 1 Field Is Required");
    }
    if(contactNumber1.val() == "")
    {
        e.preventDefault();
        toastr['error']("Contact Number 1 Field Is Required");
    }
    if(postalCode.val() == "")
    {
        e.preventDefault();
        toastr['error']("Postal Code Field Is Required");
    }
    if(paymentMethod.val() == "")
    {
        e.preventDefault();
        toastr['error']("Payment Method Field Is Required");
    }

})


});
