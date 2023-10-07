$(document).ready(function()
{
    let LastSelectOption   = $('select[name="last_order_data"]');
    let checkoutTable      = $('#checkoutTable');
    $(LastSelectOption).on('change' , function(e){
        e.preventDefault();
        let limitValue      =  $(this).val();
        $.ajax({
            url  : last_order_route + '/' + limitValue ,
            type : 'get' ,
            success:function(response)
            {
                tableRow  = "" ;
                $(response.orders).each(function(index , value){
                    let Status          =     `` ;
                    let viewLabel       = view_labelRoute + '/' + value.id ;
                    let downloadLabel   = download_labelRoute + '/' + value.id;
                    let cancelOrder     = cancelOrderRoute + '/' + value.id;
                    if(value.is_delivered == 1){
                        Status = `
                                <td data-label="Status" class="text-warning">Shipped</td>
                                `;
                    }
                    else if(value.is_delivered == 2){
                        Status = `
                                <td data-label="Status" class="text-primary">Sent For Delivery</td>
                                `;
                    }
                  else if(value.is_delivered == 3){
                        Status = `
                                <td data-label="Status" class="text-green">Delivered</td>
                                `;
                    }
                  else if(value.is_delivered == 4){
                        Status = `
                        <td data-label="Status" class="text-danger">Cancelled</td>

                                `;
                    }
                    else if (value.is_delivered == 0)
                    {
                        Status  = `
                        <td data-label="Status" class="text-danger">Pending</td>
                        `
                    }
                    tableRow +=`
                    <tr>
                <td data-label="Image"><img alt="image" style="width: 40px ; height:40px ; object-fit:contain" src="${basePath}assets/Productimages/${value.product.image}" class="img-fluid">
                </td>
                <td data-label="Order ID">#${value.tracking_id}</td>
                <td data-label="Product Details">${value.product.name}</td>
                <td data-label="price">PKR,${value.total_price}</td>
                 ${Status}
                <td><a href="${viewLabel}" class="btn btn-primary"><i class="bx bxs-coupon"></i></a></td>
                <td><a href="${downloadLabel}" class="btn btn-warning"><i class="bx bxs-cloud-download"></i></a></td>
                <td><a href="${cancelOrder}" class="btn btn-danger"><i class="bx bx-trash"></i></a></td>
                </tr>
                    `;
                });
                $(checkoutTable).html(tableRow);
            }
        })
    })
});
