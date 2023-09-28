$(document).ready(function(){
    let subCatSelect        = $('select[name="subcategory"]');
    let categorySelect      = $('#category');
    let name                = $('input[name="name"]');
    let color               = $('input[name="color"]');
    let quantity            = $('input[name="quantity"]');
    let sku                 = $('input[name="sku"]');
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
    })
});


