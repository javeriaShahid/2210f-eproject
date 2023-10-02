$(document)
.ready(function(){
  
    $(document).on('click' ,'.addToCart',function(e){
        e.preventDefault();
        let id  = $(this).siblings('input[name="productId"]').val();
        $.ajax({
            url : addToCartRoute + '/' + id ,
            type : 'Get' ,
            success:function(response)
            {
                if(response == 'success')
                {
                    e.preventDefault();
                    toastr['success']('Product added to cart');

                }
                else
                {
                    e.preventDefault();
                    toastr['error']('Error adding product to cart');
                }
            }
        })
    });
    // Deleting 
    $(document).on('click' , '.delete-icon' , function(e){
        e.preventDefault();
        let id = $(this).siblings('input[name="cartId"]').val();
        $(this).closest('tr').remove();
        let subtotal      = $('#subTotal');
        let totalAmount   = $("#totalAmount");
        let shipping_fees = $('#shipping_fees');
        $.ajax({
            url : deleteCartRoute + '/' + id ,
            type: "get" ,
            success:function(response)
            {
                if(response.message == "success")
                {
                    e.preventDefault();
                    toastr['success']("Cart has been removed");
                    subtotal.text('PKR,' + response.total);
                    shipping_fees.text('PKR,' + response.fees);
                    totalAmount.text('PKR,' + (response.total + response.fees));
                }
                if(response.message == "empty")
                {
                    e.preventDefault();
                    toastr['success']("Cart has been removed");
                    toastr['error']('No More Cart Left Add some product to cart');
                    subtotal.text('PKR,' + response.total);
                    shipping_fees.text('PKR,' + response.fees);
                    totalAmount.text('PKR,' + (response.total + response.fees));
                }
            }
        })
    }) // End of deleting cart

    //Incrementing and Decrementing Cart
    let QuantityForm   = $('#quantityForm');

    $(document).on('click' , '.plus-cart' , function(e){
        e.preventDefault();
        let id            = $(this).siblings('input[name="cart_id"]').val();
        let total         =  $(this).closest('tr').find('.totalprice');
        let subtotal      = $('#subTotal');
        let totalAmount   = $("#totalAmount");
        let shipping_fees = $('#shipping_fees');
        $.ajax({
            url   : addQuantityRoute + '/' + id ,
            type  : 'get' ,
            success:function(response)
            {
              total.text("PKR,"+response.total);
              toastr['success']("Quantity has been updated");
              subtotal.text("PKR,"+response.subTotal);
              totalAmount.text("PKR,"+(response.subTotal + response.fees));
            }
        });
    });
    // Decrement CART

    $(document).on('click' , '.minus-cart' , function(e){
        e.preventDefault();
        let id            = $(this).siblings('input[name="cart_id"]').val();
        let total         =  $(this).closest('tr').find('.totalprice');
       
        let subtotal      = $('#subTotal');
        let totalAmount   = $("#totalAmount");
        let shipping_fees = $('#shipping_fees');
        $.ajax({
            url   : minusQuantityCart + '/' + id ,
            type  : 'get' ,
            success:function(response)
            {
                if(response.message == "success")
                {
                    total.text("PKR,"+response.total);
                    toastr['success']("Quantity has been updated");
                    subtotal.text("PKR,"+response.subTotal);
                    totalAmount.text("PKR,"+(response.subTotal + response.fees));
                }
                else
                {
                    toastr['error']("Can't Decrement More ");
                }
            }
        });
    });
})
