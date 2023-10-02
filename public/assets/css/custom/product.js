$(document).ready(function(){
    let subImage                 = $('input[name="subimage[]"]');
    let mainImage                = $('input[name="image"]');
    let subCatSelect             = $('select[name="subcategory"]');
    let categorySelect           = $('#category');
    let name                     = $('input[name="name"]');
    let brand                    = $('select[name="brand"]');
    let color                    = $('input[name="color"]');
    let quantity                 = $('input[name="quantity"]');
    let price                    = $('input[name="price"]');
    let description              = $('textarea[name="description"]');
    let sku                      = $('input[name="sku"]');
    let productForm              = $('#productForm');
    let shippingFees             = $('input[name="shipping_fees"]');
    let delivery_duration        = $('input[name="delivery_duration"]');
    // Validations For Product Form
    $(productForm).submit(function(e){
        if($(name).val() == "")
        {
            e.preventDefault();
            toastr['error']('Name Field is required');
        }
        
        if($(quantity).val() == "")
        {
            e.preventDefault();
            toastr['error']('Quantity Field is required');
        }
        
        if($(brand).val() == "")
        {
            e.preventDefault();
            toastr['error']('Brand Field is required');
        }
        if($(price).val() == "")
        {
            e.preventDefault();
            toastr['error']('Price Field is required');
        }
        if(action == "create")
        {
            if($(mainImage).val() == "")
            {
                e.preventDefault();
                toastr['error']('Product Image Field is required');
            }
            if($(subImage).val() == "")
            {
                e.preventDefault();
                toastr['error']('Sub Image Field is required');
            }
        }
        if($(sku).val() == "")
        {
            e.preventDefault();
            toastr['error']('Sku Field is required');
        }
        if($(description).val() == "")
        {
            e.preventDefault();
            toastr['error']('Description Field is required');
        }
        if($(categorySelect).val() == "")
        {
            e.preventDefault();
            toastr['error']('Category Field is required');
        }
        if($(subCatSelect).val() == "")
        {
            e.preventDefault();
            toastr['error']('Sub Category Field is required');
        }

    });
    // End of Validations
    $(categorySelect).on('change' , function(e){
        e.preventDefault();
        tableRow = "<option>Select Category First</option>";
        $.ajax({
            url : subCatRoute + '/' + categorySelect.val(),
            type : 'get',
            success:function(response)
            {
                $(response).each(function(index, value){
                 tableRow += `<option value="${value.id}">${value.name}</option>`;
                });
                $(subCatSelect).html(tableRow);
            }
        })
    });
// Sku Generating
    $(color).on('change' , function(e){
        e.preventDefault();
        console.log('Name' ,name.val());
        console.log('Color',$(this).val().replace('#' , ''));
        console.log('quantity', parseInt(quantity.val()));
        let productColor  = color.val().replace('#' , '') ;
        let productQty    = quantity.val();
        let productName   = name.val();
        var createdSku    = productName.split(' ').map(function(word){
            return word.charAt(6).toUpperCase();
        }).join('') + '-' +productColor+ '-' + productQty;

       $(sku).val(createdSku);
    });

    // Edit Product
    if(action == "edit"){
        $(name).val(product.name);
        $(price).val(product.price);
        $(quantity).val(product.stock);
        $(color).val(product.color_code);
        $(sku).val(product.sku);
        $(categorySelect).val(product.category_id);
        $(subCatSelect).html("<option value="+product.subcategory.id+">"+product.subcategory.name+"</option>");
        $(description).val(product.description);
        $(brand).val(product.brand_id);
        $(shippingFees).val(product.shipping_fees);
    }
    // End of Edit Product
});


