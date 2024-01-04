$(document).ready(function(){
    let subImage                 = $('input[name="subimage[]"]');
    let mainImage                = $('input[name="image"]');
    let subCatSelect             = $('select[name="subcategory"]');
    let categorySelect           = $('#category');
    let name                     = $('input[name="name"]');
    let brand                    = $('select[name="brand"]');
    let color                    = $('input[name="color[]"]');
    let quantity                 = $('input[name="quantity"]');
    let price                    = $('input[name="price"]');
    let short_description        = $('textarea[name="short_description"]');
    let description              = $('textarea[name="description"]');
    let sku                      = $('input[name="sku"]');
    let productForm              = $('#productForm');
    let shippingFees             = $('input[name="shipping_fees"]');
    let delivery_duration        = $('input[name="delivery_duration"]');
    let colorContainer           = $(".colorContainer");
    let weight                   = $('input[name="weight"]');
    let weightType               = $("select[name='weight_type']");
    $(description).richText();


    // Validations For Product Form
    $(productForm).submit(function(e){
        if($(name).val() == "")
        {
            e.preventDefault();
            toastr['error']('Name Field is required');
            return false;
        }

        if($(quantity).val() == "")
        {
            e.preventDefault();
            toastr['error']('Quantity Field is required');
            return false;

        }

        if($(brand).val() == "")
        {
            e.preventDefault();
            toastr['error']('Brand Field is required');
            return false;

        }

        if($(delivery_duration).val() == "")
        {
            e.preventDefault();
            toastr['error']('Delvery Duration Field is required');
            return false;

        }
        if($(price).val() == "")
        {
            e.preventDefault();
            toastr['error']('Price Field is required');
            return false;

        }
        if(action == "create")
        {
            if($(mainImage).val() == "")
            {
                e.preventDefault();
                toastr['error']('Product Image Field is required');
                return false;

            }
            if($(subImage).val() == "")
            {
                e.preventDefault();
                toastr['error']('Sub Image Field is required');
                return false;

            }
        }
        if($(weight).val() == ""){
            e.preventDefault();
            toastr['error']('Product Weight is required');
            return false;
        }
        if($(weightType).val() == ""){
            e.preventDefault();
            toastr['error']('Weight Type is required');
            return false;
        }
        if($(sku).val() == "")
        {
            e.preventDefault();
            toastr['error']('Sku Field is required');
        }
        if($(short_description).val() == "")
        {
            e.preventDefault();
            toastr['error']('Short Description Field is required');
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
        let color = product.color_code
        let colorContainerData = "";
        $(JSON.parse(color)).each(function(index , value){
            var colClass  = index === 0 ? 'col-md-12' : 'col-md-4';
          var colButton = index === 0 ? ' <button class="btn btn-success btn-sm addcolor" style="margin-left:10px;margin-bottom:5px;" ><i class="bx bx-plus"></i></button>'          : '<button class="btn btn-danger removecolor btn-sm" style="margin-left:10px;margin-bottom:5px;" ><i class="bx bx-x"></i></button>';
          colorContainerData += `<div class="${colClass} mb-3 d-flex">
          <input name="color[]" value='${value}' type="color" class="form-control" placeholder="Enter Product name" aria-describedby="defaultFormControlHelp"/>
          ${colButton}
        </div>` ;
          $(colorContainer).html(colorContainerData)
        });
        $(name).val(product.name);
        $(price).val(product.price);
        $(quantity).val(product.stock);
        $(sku).val(product.sku);
        $(categorySelect).val(product.category_id);
        $(subCatSelect).html("<option value="+product.subcategory.id+">"+product.subcategory.name+"</option>");
        $(description).val(product.description);
        $(short_description).val(product.short_description);
        $(brand).val(product.brand_id);
        $(shippingFees).val(product.shipping_fees);
        $(weight).val(product.weight);
        $(weightType).val(product.weight_type);
        $(delivery_duration).val(product.delivery_duration);
    }
    // End of Edit Product
    // adding Multiple Colors
    $(document).on('click' , '.addcolor' , function(e){
        e.preventDefault();
        colorData = `<div class="col-md-4 d-flex">
        <input name="color[]" type="color" class="form-control" placeholder="Enter Product name" aria-describedby="defaultFormControlHelp"/>
        <button class="btn btn-danger removecolor btn-sm" style="margin-left:10px;margin-bottom:5px;" ><i class="bx bx-x"></i></button>
      </div>`;
        $(colorContainer).append(colorData);
    });

    $(document).on('click' , '.removecolor' , function(e){
        e.preventDefault();
        $(this).closest('div').remove();
    })
});


